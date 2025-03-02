<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class AfupDay
{
    public function __construct(
        private RawConfig $config,
    ) {
    }

    public function date(string $date): self
    {
        $this->config->afupDayDate = Date::new($date, "de l'AFUP Day");
        $this->config->hasAfupDay = true;

        return $this;
    }

    public function villes(string ...$villes): self
    {
        $this->config->afupDayVilles = $villes;
        $this->config->hasAfupDay = true;

        return $this;
    }

    public function inclureQRCodeCFP(): self
    {
        $this->config->afupDayInclureQRCodeCFP = true;
        $this->config->hasAfupDay = true;

        return $this;
    }

    public function quantitePropositions(int $quantite): self
    {
        $this->config->afupDayQuantitePropositions = $quantite;
        $this->config->hasAfupDay = true;

        return $this;
    }

    public function earlyBirdsEncoreDisponibles(): self
    {
        $this->config->afupDayEarlyBirdsEncoreDisponibles = true;
        $this->config->hasAfupDay = true;

        return $this;
    }

    public function inclurePhotosEditionPrecedente(int $annee): self
    {
        $this->config->afupDayInclurePhotosEditionPrecedente = $annee;
        $this->config->hasAfupDay = true;

        return $this;
    }

    public function dateProgrammeDisponible(string $date): self
    {
        $this->config->afupDayDateProgrammeDisponible = Date::new($date, "de la dispo du programme");
        $this->config->hasAfupDay = true;

        return $this;
    }
}
