<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Talk
{
    public function __construct(
        public string $speaker,
        public string $title,
    ) {
    }
}
