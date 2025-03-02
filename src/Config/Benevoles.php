<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Benevoles
{
    public function __construct(
        private RawConfig $config,
    ) {
    }

    public function with(string $nom, string $photo): self
    {
        $this->config->benevoles[] = new Benevole($nom, $photo);

        return $this;
    }
}
