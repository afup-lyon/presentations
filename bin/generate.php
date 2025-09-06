#!/usr/bin/env php
<?php
require __DIR__ . '/../vendor/autoload.php';

use AfupLyon\Slides\Generate\SlidesGenerator;
use AfupLyon\Slides\Slides;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Process\Process;

(new SingleCommandApplication())
    ->addOption('override', null, InputOption::VALUE_OPTIONAL, 'Écraser le dossier existant', false)
    ->addOption('build', null, InputOption::VALUE_OPTIONAL, 'Lancer le build à la fin de la génération', false)
    ->setCode(function (InputInterface $input, OutputInterface $output): int {
        $io = new SymfonyStyle($input, $output);

        $slidesConfigPath = Path::canonicalize(__DIR__ . '/../config/options.php');

        if (!file_exists($slidesConfigPath)) {
            $io->error('Fichier de configuration non trouvé : ' . $slidesConfigPath);
            return Command::FAILURE;
        }

        $slides = require $slidesConfigPath;

        if (!$slides instanceof Slides) {
            $io->error("Configuration invalide");
            return Command::FAILURE;
        }

        $config = $slides();

        if (count($config->benevoles) === 0) {
            $io->warning('Aucun bénévole');
        }

        if (count($config->contacts) === 0) {
            $io->warning('Aucune info de contact');
        }

        if (count($config->talks) === 0) {
            $io->warning('Aucun talk');
        } else if (count($config->talks) > 2) {
            $io->warning("Plus de 2 talks, l'affichage sera à revoir");
        }

        $generator = new SlidesGenerator();

        try {
            $newPath = $generator->generate($config, overrideExisting: $input->getOption('override') === null);
        } catch (Throwable $e) {
            $io->error($e->getMessage());
            return Command::FAILURE;
        }

        $io->success('Slides générées : ' . $newPath);

        $relative = Path::makeRelative($newPath, __DIR__ . '/../');

        if ($input->getOption('build') === null) {
            $process = Process::fromShellCommandline("cd ./$relative && npm install && npm run build");
            $process->start();

            $io->note('Building ...');
            $section = $output->section();
            $section->setMaxHeight(20);

            foreach ($process as $data) {
                $section->write($data);
            }

            $io->block([
                "Pour lancer la présentation :",
                "cd ./$relative && npm run start",
            ]);
        } else {
            $io->block([
                "Pour lancer la présentation :",
                "cd ./$relative && npm install && npm run build && npm run start",
            ]);
        }

        return Command::SUCCESS;
    })
    ->run();
