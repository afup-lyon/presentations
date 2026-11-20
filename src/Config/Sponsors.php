<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Sponsors
{
    public function __construct(
        private RawConfig $config,
    ) {
    }

    /**
     * @param string $logo fichier de config/img/sponsors/
     */
    public function with(string $nom, string $logo): self
    {
        $this->config->sponsors[] = new Sponsor($nom, $logo);

        return $this;
    }
}
