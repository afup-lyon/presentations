<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

use DateTimeImmutable;

final readonly class Date
{
    public static function new(string $rawDate, string $dateName): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat('Y-m-d', $rawDate) ?: throw new \Exception("La date $dateName doit être au format Y-m-d");
    }
}
