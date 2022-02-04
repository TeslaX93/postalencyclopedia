<?php

namespace App\Model;

use App\Entity\Provider;

class CountryBar
{
    private string $emoji;

    private string $name;

    private string $nameLocal;

    private string $templateFormat;

    private string $postalCodeFormat;

    private array $provider;

    public function __construct(
        string $emoji,
        string $name,
        string $nameLocal,
        string $templateFormat,
        string $postalCodeFormat,
        array $provider
    ) {
        $this->emoji = $emoji;
        $this->name = $name;
        $this->nameLocal = $nameLocal;
        $this->templateFormat = $templateFormat;
        $this->postalCodeFormat = $postalCodeFormat;
        $this->provider = $provider;
    }

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNameLocal(): string
    {
        return $this->nameLocal;
    }

    /**
     * @return string
     */
    public function getTemplateFormat(): string
    {
        return $this->templateFormat;
    }

    /**
     * @return string
     */
    public function getPostalCodeFormat(): string
    {
        return $this->postalCodeFormat;
    }

    /**
     * @return Provider[]
     */
    public function getProvider(): array
    {
        return $this->provider;
    }

}
