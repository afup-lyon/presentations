<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Calendrier
{
    public function __construct(
        private RawConfig $config,
    ) {
    }

    /**
     * @param string|null $logo fichier de config/img/calendrier/ affiché sous le titre (lieu, partenaire…)
     */
    public function date(string $date, string $title, ?string $logo = null): self
    {
        $this->config->calendrierAntenne[] = new DateCalendrier(Date::new($date, "de l'event $title"), $title, $logo);

        return $this;
    }

    /**
     * @param string|null $logo fichier de config/img/calendrier/ affiché sous le titre (lieu, partenaire…)
     */
    public function customDate(string $date, string $title, ?string $logo = null): self
    {
        $this->config->calendrierAntenne[] = new DateCalendrier($date, $title, $logo);

        return $this;
    }
}
