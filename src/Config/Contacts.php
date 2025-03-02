<?php

declare(strict_types=1);

namespace AfupLyon\Slides\Config;

final readonly class Contacts
{
    public function __construct(
        private RawConfig $config,
    ) {
    }

    public function twitter(string $username): self
    {
        $this->config->contacts[] = new Contact('Twitter', '@' . $username, 'https://twitter.com/' . $username);

        return $this;
    }

    public function mastodon(string $url, string $label): self
    {
        $this->config->contacts[] = new Contact('Mastodon', $label, $url);

        return $this;
    }

    public function bluesky(string $url, string $label): self
    {
        $this->config->contacts[] = new Contact('Bluesky', $label, $url);

        return $this;
    }

    public function linkedIn(string $url, string $label): self
    {
        $this->config->contacts[] = new Contact('LinkedIn', $label, $url);

        return $this;
    }

    public function meetup(string $url, string $label): self
    {
        $this->config->contacts[] = new Contact('Meetup', $label, $url);

        return $this;
    }

    public function mail(string $mail): self
    {
        $this->config->contacts[] = new Contact('Mail', $mail, 'mailto:' . $mail);

        return $this;
    }
}
