<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

use DateTimeImmutable;

final readonly class DateCalendrier
{
    public function __construct(
        public DateTimeImmutable|string $date,
        public string $title,
    ) {
    }
}
