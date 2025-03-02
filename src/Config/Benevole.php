<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Benevole
{
    public function __construct(
        public string $nom,
        public string $photo,
    ) {
    }
}
