<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

use DateTimeImmutable;

final class RawConfig
{
    public DateTimeImmutable $date;

    /** @var array<Benevole> */
    public array $benevoles = [];

    /** Nom du ou de la bénévole qui présente le meetup (photo sur la slide de bienvenue). */
    public ?string $presentateur = null;

    public ?Benevole $presentateurBenevole {
        get {
            foreach ($this->benevoles as $benevole) {
                if ($benevole->nom === $this->presentateur) {
                    return $benevole;
                }
            }

            return null;
        }
    }

    public bool $introductionAssociation = false;
    public bool $introductionActions = false;
    public bool $introductionAntennes = false;
    public bool $introductionForum = false;

    public bool $hasIntro {
        get => $this->introductionAssociation
            || $this->introductionActions
            || $this->introductionAntennes
            || $this->introductionForum;
    }

    public bool $hasAfupDay = false;
    public ?DateTimeImmutable $afupDayDate = null;
    public bool $afupDayInclureQRCodeCFP = false;
    /** @var array<string> */
    public array $afupDayVilles = [];
    public ?int $afupDayQuantitePropositions = null;
    public bool $afupDayEarlyBirdsEncoreDisponibles = false;
    public ?int $afupDayInclurePhotosEditionPrecedente = null;
    public ?DateTimeImmutable $afupDayDateProgrammeDisponible = null;

    /** @var array<DateCalendrier> */
    public array $calendrierAntenne = [];

    /** @var array<Contact> */
    public array $contacts = [];

    /** @var array<Sponsor> */
    public array $sponsors = [];

    public bool $withJetbrainsGift = false;
    public bool $withDrink = false;
    public bool $withJoke = true;

    /** @var array<Talk> */
    public array $talks = [];

    public function __construct(DateTimeImmutable $date)
    {
        $this->date = $date;
    }
}
