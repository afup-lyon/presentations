<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Contact
{
    public function __construct(
        public string $name,
        public string $label,
        public string $url,
    ) {}
}
