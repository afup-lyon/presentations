<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Talks
{
    public function __construct(
        private RawConfig $config,
    ) {
    }

    public function with(string $speaker, string $title): self
    {
        $this->config->talks[] = new Talk($speaker, $title);

        return $this;
    }
}
