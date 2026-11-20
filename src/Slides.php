<?php

declare(strict_types=1);

namespace AfupLyon\Slides;

use AfupLyon\Slides\Config\AfupDay;
use AfupLyon\Slides\Config\Benevoles;
use AfupLyon\Slides\Config\Calendrier;
use AfupLyon\Slides\Config\Contacts;
use AfupLyon\Slides\Config\Date;
use AfupLyon\Slides\Config\Intro;
use AfupLyon\Slides\Config\RawConfig;
use AfupLyon\Slides\Config\Sponsors;
use AfupLyon\Slides\Config\Talks;

final class Slides
{
    private RawConfig $config;

    private function __construct(RawConfig $config)
    {
        $this->config = $config;
    }

    public static function new(string $date): Slides
    {
        return new Slides(new RawConfig(Date::new($date, "du meetup")));
    }

    public function __invoke(): RawConfig
    {
        return $this->config;
    }

    public function benevoles(callable $cb): self
    {
        $cb(new Benevoles($this->config));

        return $this;
    }

    /**
     * Bénévole qui présente le meetup : sa photo (déclarée dans benevoles()) s'affiche sur la slide de bienvenue.
     */
    public function presentePar(string $nom): self
    {
        $this->config->presentateur = $nom;

        return $this;
    }

    public function introduction(callable $cb): self
    {
        $cb(new Intro($this->config));

        return $this;
    }

    public function afupDay(callable $cb): self
    {
        $cb(new AfupDay($this->config));

        return $this;
    }

    public function calendrierAntenne(callable $cb): self
    {
        $cb(new Calendrier($this->config));

        return $this;
    }

    public function contact(callable $cb): self
    {
        $cb(new Contacts($this->config));

        return $this;
    }

    public function sponsors(callable $cb): self
    {
        $cb(new Sponsors($this->config));

        return $this;
    }

    public function talks(callable $cb): self
    {
        $cb(new Talks($this->config));

        return $this;
    }

    public function withJetbrainsGift(): self
    {
        $this->config->withJetbrainsGift = true;

        return $this;
    }

    public function withDrink(): self
    {
        $this->config->withDrink = true;

        return $this;
    }

    public function noJoke(): self
    {
        $this->config->withJoke = false;

        return $this;
    }
}
