<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

use DateTimeImmutable;

final class RawConfig
{
    public DateTimeImmutable $date;

    /** @var array<Benevole> */
    public array $benevoles = [];

    public bool $introductionAssociation = false;
    public bool $introductionBarometre = false;
    public bool $introductionAntennes = false;
    public bool $introductionForum = false;

    public bool $hasIntro {
        get => $this->introductionAssociation
            || $this->introductionBarometre
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

    public bool $withJetbrainsGift = false;

    /** @var array<Talk> */
    public array $talks = [];

    public function __construct(DateTimeImmutable $date)
    {
        $this->date = $date;
    }
}
