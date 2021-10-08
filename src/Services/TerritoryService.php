<?php

namespace App\Services;

use App\Repository\TerritoryRepository;

class TerritoryService
{
    private TerritoryRepository $territoryRepository;

    public function __construct(TerritoryRepository $territoryRepository)
    {
        $this->territoryRepository = $territoryRepository;
    }

    public function getTerritories(array $options = [])
    {
        return $this->territoryRepository->getNames();
    }
}
