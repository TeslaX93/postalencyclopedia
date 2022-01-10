<?php

namespace App\Repository;

use App\Entity\Territory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\String\Slugger\AsciiSlugger;

class TerritoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Territory::class);
    }

    public function createTerritory(
        $name,
        $nameFr,
        $nameLocal,
        $fullname,
        $fullnameFr,
        $fullnameLocal,
        $isDepended,
        $isRecognized,
        $templateFormat,
        $postalCodeFormat,
        $addressFormat,
        $addressLocation,
        $upuShortcut,
        $iso3166
    ): Territory {
        $slugger = new AsciiSlugger();

        $territory = new Territory();
        $territory->setName($name);
        $territory->setSlug($slugger->slug($name, '_'));
        $territory->setNameFr($nameFr);
        $territory->setNameLocal($nameLocal);
        $territory->setFullname($fullname);
        $territory->setFullnameFr($fullnameFr);
        $territory->setFullnameLocal($fullnameLocal);
        $territory->setIsDepended($isDepended);
        $territory->setIsRecognized(!$isRecognized);
        $territory->setTemplateFormat($templateFormat);
        $territory->setPostalCodeFormat($postalCodeFormat);
        $territory->setAddressFormat($addressFormat);
        $territory->setAddressLocation($addressLocation);
        $territory->setUpuShortcut($upuShortcut);
        $territory->setIso3166($iso3166);
        if (is_null($iso3166) || strlen($iso3166) == 2) {
            $isoLetters = str_split(strtoupper($iso3166));
            $emoji = "";
            $emoji .= mb_convert_encoding('&#' . ( 127397 + ord($isoLetters[0]) ) . ';', 'UTF-8', 'HTML-ENTITIES');
            $emoji .= mb_convert_encoding('&#' . ( 127397 + ord($isoLetters[1]) ) . ';', 'UTF-8', 'HTML-ENTITIES');
            $territory->setEmoji($emoji);
        }

        return $territory;
    }

    /**
     * @param array $options
     * @return array
     */
    public function getNames(array $options = []): array
    {
        return $this->createQueryBuilder('t')
            ->select('t.name', 't.iso3166', 't.slug', 't.emoji')
            ->getQuery()
            ->getResult();
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
