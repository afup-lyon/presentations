<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Intro
{
    public function __construct(
        private RawConfig $config,
    ) {
    }

    public function association(): self
    {
        $this->config->introductionAssociation = true;

        return $this;
    }

    public function barometre(): self
    {
        $this->config->introductionBarometre = true;

        return $this;
    }

    public function antennes(): self
    {
        $this->config->introductionAntennes = true;

        return $this;
    }

    public function forum(): self
    {
        $this->config->introductionForum = true;

        return $this;
    }
}
