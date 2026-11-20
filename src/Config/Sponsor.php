<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Sponsor
{
    public function __construct(
        public string $nom,
        /** Fichier de config/img/sponsors/ */
        public string $logo,
    ) {
    }
}
