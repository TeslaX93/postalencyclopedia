<?php

namespace App\Repository;

use App\Entity\Territory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TerritoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Territory::class);
    }

    /**
     * @param array $options
     */
    public function getNames(array $options = []): array
    {
        $territories =  $this->createQueryBuilder('t')
            ->select('t.name', 't.iso3166')
            ->getQuery()
            ->getResult();

        $territoriesList = [];
        foreach ($territories as $territory) {
            $territoriesList[$territory['iso3166']] = $territory['name'];
        }

        return $territoriesList;
    }


    /**
     * @param Territory $territory
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Territory $territory): void
    {
        $em = $this->getEntityManager();
        $em->persist($territory);
        $em->flush();
    }
}
