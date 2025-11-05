<?php

declare(strict_types=1);

use AfupLyon\Slides\Config\AfupDay;
use AfupLyon\Slides\Config\Benevoles;
use AfupLyon\Slides\Config\Calendrier;
use AfupLyon\Slides\Config\Contacts;
use AfupLyon\Slides\Config\Intro;
use AfupLyon\Slides\Config\Talks;
use AfupLyon\Slides\Slides;

return Slides::new('2025-11-06')

    ->withJetbrainsGift()

    ->benevoles(fn (Benevoles $benevoles) => $benevoles
        // ->with('Christophe', 'Christophe.png')
        // ->with('Émilie', 'Émilie.png')
        ->with('Florian', 'Florian.png')
        ->with('Mathias', 'Mathias.jpg')
        // ->with('Maxime', 'Maxime.jpg')
        ->with('Nathan', 'Nathan.png')
        ->with('Romane', 'Romane.jpg')
        // ->with('Vincent', 'Vincent.jpg')
        ->with('Nina', 'Nina.png')
        ->with('Mohamed', 'Mohamed.png')
    )

    ->introduction(fn (Intro $intro) => $intro
        ->association()
        // ->barometre()
        ->antennes()
        // ->forum()
    )

    ->afupDay(fn (AfupDay $afupDay) => $afupDay
        ->date('2025-05-22')
        ->villes('Lyon', 'Bordeaux', 'Lille', 'Paris')
       ->inclureQRCodeCFP()
       ->quantitePropositions(50)
       ->earlyBirdsEncoreDisponibles()
        ->inclurePhotosEditionPrecedente(2024)
        // ->dateProgrammeDisponible('2025-01-07')
    )

    ->calendrierAntenne(fn (Calendrier $calendrier) => $calendrier
        // ->date('2025-09-10', 'Forum !')
        // ->date('2025-10-01', 'Apéro post forum') // TODO: la date
        // ->date('2025-11-06', 'Meetup')
        ->date('2025-12-09', 'Apéro de Noël 🎄')
        ->date('2026-01-08', 'Meetup Atelier 👨‍💻')
        ->date('2026-02-03', 'Meetup')
        ->date('2026-03-01', 'Super Apéro PHP 🍻') // TODO: la date
        ->date('2026-04-07', 'Meetup')
        ->date('2026-05-01', 'Apéro 🍻') // TODO: la date
        ->date('2025-05-22', "AFUP Day 🐘")
        ->date('2025-06-12', "Élections de l'antenne 🗳️")

    )

    ->contact(fn (Contacts $contacts) => $contacts
        ->meetup('https://www.meetup.com/fr-FR/afup-lyon-php', 'meetup.com/fr-FR/afup-lyon-php')
        ->linkedIn('https://www.linkedin.com/company/afup-lyon', 'linkedin.com/company/afup-lyon')
//        ->twitter('AFUP_Lyon')
        ->bluesky('https://bsky.app/profile/lyon.afup.org', '@lyon.afup.org')
        ->mail('antenne-lyon@afup.org')
    )

    ->talks(fn (Talks $talks) => $talks
        ->with('Florian Bogey', 'Git sous le capot')
        ->with('Vincent Amstoutz', 'API Platform : repenser les filtres')
    )

;
