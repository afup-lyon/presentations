<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Generate;

use AfupLyon\Slides\Config\RawConfig;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Twig\Environment;
use Twig\Extra\Intl\IntlExtension;
use Twig\Loader\FilesystemLoader;

final readonly class SlidesGenerator
{
    private Filesystem $filesystem;
    private Environment $twig;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
        $this->twig = new Environment(new FilesystemLoader(__DIR__ . '/../../templates'));
        $this->twig->addExtension(new IntlExtension());
    }

    private function slidesPath(RawConfig $config): string
    {
        return Path::canonicalize(__DIR__ . '/../../_slides/' . $config->date->format('Y-m-d'));
    }

    public function generate(RawConfig $config, bool $overrideExisting): string
    {
        $newSlidesDirectoryPath = $this->slidesPath($config);

        if ($this->filesystem->exists($newSlidesDirectoryPath)) {
            if (!$overrideExisting) {
                throw new \Exception("Le dossier $newSlidesDirectoryPath existe déjà");
            }

            $this->filesystem->remove($newSlidesDirectoryPath);
        }

        $this->filesystem->mkdir($newSlidesDirectoryPath);

        $this->filesystem->mirror(
            __DIR__ . '/../../templates/_directory',
            $newSlidesDirectoryPath,
        );

        $this->filesystem->mirror(
            __DIR__ . '/../../config/img',
            $newSlidesDirectoryPath . '/img',
        );

        $html = $this->twig->render('_root.html.twig', [
            'config' => $config,
        ]);

        file_put_contents(
            Path::join($newSlidesDirectoryPath, 'index.html'),
            $html,
        );

        return $newSlidesDirectoryPath;
    }
}
