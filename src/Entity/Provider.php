<?php

namespace App\Entity;

use App\Repository\ProviderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $trackingWebsite;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isTrackable;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, cascade={"persist", "remove"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $acronym;

    /**
     * @ORM\ManyToMany(targetEntity=Territory::class, inversedBy="providers")
     */
    private $territories;

    public function __construct()
    {
        $this->territories = new ArrayCollection();
    }


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

    public function __toString(): string
    {
        return $this->name;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    /**
     * @return Collection|Territory[]
     */
    public function getTerritories(): Collection
    {
        return $this->territories;
    }

    public function addTerritory(Territory $territory): self
    {
        if (!$this->territories->contains($territory)) {
            $this->territories[] = $territory;
        }

        return $this;
    }

    public function removeTerritory(Territory $territory): self
    {
        $this->territories->removeElement($territory);

        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }
}
