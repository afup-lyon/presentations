<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

use DateTimeImmutable;

final readonly class DateCalendrier
{
    public function __construct(
        public DateTimeImmutable|string $date,
        public string $title,
        /** Logo affiché dans la carte, depuis config/img/calendrier/ */
        public ?string $logo = null,
    ) {
    }

    /**
     * Vrai pour une date saisie librement avec Calendrier::customDate() (ex. « Courant mars »).
     */
    public function estTexteLibre(): bool
    {
        return is_string($this->date);
    }
}
