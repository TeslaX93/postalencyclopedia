<?php

namespace App\Services;

use App\Repository\TerritoryRepository;
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
}
