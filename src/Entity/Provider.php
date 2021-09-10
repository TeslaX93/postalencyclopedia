<?php

namespace App\Entity;

use App\Repository\ProviderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProviderRepository::class)
 */
class Provider
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trackingWebsite;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTrackable;

    /**
     * @ORM\ManyToOne(targetEntity=Territory::class, inversedBy="providers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $territory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getTrackingWebsite(): ?string
    {
        return $this->trackingWebsite;
    }

    public function setTrackingWebsite(?string $trackingWebsite): self
    {
        $this->trackingWebsite = $trackingWebsite;

        return $this;
    }

    public function getIsTrackable(): ?bool
    {
        return $this->isTrackable;
    }

    public function setIsTrackable(bool $isTrackable): self
    {
        $this->isTrackable = $isTrackable;

        return $this;
    }

    public function getTerritory(): ?Territory
    {
        return $this->territory;
    }

    public function setTerritory(?Territory $territory): self
    {
        $this->territory = $territory;

        return $this;
    }
}
