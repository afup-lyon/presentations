<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Calendrier
{
    public function __construct(
        private RawConfig $config,
    ) {
    }

    public function date(string $date, string $title): self
    {
        $this->config->calendrierAntenne[] = new DateCalendrier(Date::new($date, "de l'event $title"), $title);

        return $this;
    }

    public function customDate(string $date, string $title): self
    {
        $this->config->calendrierAntenne[] = new DateCalendrier($date, $title);

        return $this;
    }
}
