<?php

namespace App\Model;

class Carrier
{
    private bool $trackable;

    private string $country;

    private string $url;

    private string $name;

    public function __construct(
        bool $trackable,
        string $country,
        string $url,
        string $name
    ) {
        $this->trackable = $trackable;
        $this->country = $country;
        $this->url = $url;
        $this->name = $name;
    }
}
