<?php

namespace App\Services;

use App\Model\CountryBar;
use App\Repository\TerritoryRepository;
use PHPUnit\Util\Exception;
use Symfony\Contracts\Translation\TranslatorInterface;

class TerritoryService
{
    private TerritoryRepository $territoryRepository;

    private TranslatorInterface $translator;

    public function __construct(TerritoryRepository $territoryRepository, TranslatorInterface $translator)
    {
        $this->territoryRepository = $territoryRepository;
        $this->translator = $translator;
    }

    public function getTerritories(array $options = []): array
    {
        $territories = $this->territoryRepository->getNames();
        $translatedTerritories = [];
        foreach($territories as $territory) {
            $translatedTerritories[$territory['iso3166']] = $this->translator->trans($territory['name']);
        }
        sort($translatedTerritories);

        return $translatedTerritories;
    }

    public function getCountryInfos(string $countryIso, array $options = []): CountryBar
    {
        $territory = $this->territoryRepository->getAllDataForTerritory($countryIso);

        if(!$territory) {
            throw new Exception("Page not found", 404);
        }

        return new CountryBar(
            $territory[0]->getEmoji(),
            $territory[0]->getName(),
            $territory[0]->getNameLocal(),
            $territory[0]->getTemplateFormat(),
            $territory[0]->getPostalCodeFormat(),
            [$territory[0]->getProviders()[0]->getName()]
        );
    }
}
