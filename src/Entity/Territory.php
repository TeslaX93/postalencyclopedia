<?php

namespace App\Entity;

use App\Repository\TerritoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TerritoryRepository::class)
 */
class Territory
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
     * @ORM\Column(type="string", length=255)
     */
    private $nameFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameLocal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullnameFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullnameLocal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDependend;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRecognized;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $templateFormat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postalCodeFormat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressFormat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addressLocation;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $upuShortcut;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $iso3166;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $emoji;

    /**
     * @ORM\OneToMany(targetEntity=Provider::class, mappedBy="territory")
     */
    private $providers;

    public function __construct(
        string $name,
        string $nameFr,
        string $nameLocal,
        string $fullname,
        string $fullnameFr,
        string $fullnameLocal,
        bool $isDependend,
        bool $isRecognized,
        string $templateFormat,
        ?string $postalCodeFormat,
        ?string $addressFormat,
        string $addressLocation,
        ?string $upuShortcut,
        ?string $iso3166,
        ?string $emoji
    ) {
        $this->providers = new ArrayCollection();
        $this->name = $name;
        $this->nameFr = $nameFr;
        $this->nameLocal = $nameLocal;
        $this->fullname = $fullname;
        $this->fullnameFr = $fullnameFr;
        $this->fullnameLocal = $fullnameLocal;
        $this->isDependend = $isDependend;
        $this->isRecognized = $isRecognized;
        $this->templateFormat = $templateFormat;
        $this->postalCodeFormat = $postalCodeFormat;
        $this->addressFormat = $addressFormat;
        $this->addressLocation = $addressLocation;
        $this->upuShortcut = $upuShortcut;
        $this->iso3166 = $iso3166;
        $this->emoji = $emoji;
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

    public function getNameFr(): ?string
    {
        return $this->nameFr;
    }

    public function setNameFr(string $nameFr): self
    {
        $this->nameFr = $nameFr;

        return $this;
    }

    public function getNameLocal(): ?string
    {
        return $this->nameLocal;
    }

    public function setNameLocal(string $name_local): self
    {
        $this->nameLocal = $name_local;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getFullnameFr(): ?string
    {
        return $this->fullnameFr;
    }

    public function setFullnameFr(string $fullnameFr): self
    {
        $this->fullnameFr = $fullnameFr;

        return $this;
    }

    public function getFullnameLocal(): ?string
    {
        return $this->fullnameLocal;
    }

    public function setFullnameLocal(string $fullnameLocal): self
    {
        $this->fullnameLocal = $fullnameLocal;

        return $this;
    }

    public function getIsDependend(): ?bool
    {
        return $this->isDependend;
    }

    public function setIsDependend(bool $isDependend): self
    {
        $this->isDependend = $isDependend;

        return $this;
    }

    public function getIsRecognized(): ?bool
    {
        return $this->isRecognized;
    }

    public function setIsRecognized(bool $isRecognized): self
    {
        $this->isRecognized = $isRecognized;

        return $this;
    }

    public function getTemplateFormat(): ?string
    {
        return $this->templateFormat;
    }

    public function setTemplateFormat(string $templateFormat): self
    {
        $this->templateFormat = $templateFormat;

        return $this;
    }

    public function getPostalCodeFormat(): ?string
    {
        return $this->postalCodeFormat;
    }

    public function setPostalCodeFormat(?string $postalCodeFormat): self
    {
        $this->postalCodeFormat = $postalCodeFormat;

        return $this;
    }

    public function getAddressLocation(): ?string
    {
        return $this->addressLocation;
    }

    public function setAddressLocation(string $addressLocation): self
    {
        $this->addressLocation = $addressLocation;

        return $this;
    }

    public function getUpuShortcut(): ?string
    {
        return $this->upuShortcut;
    }

    public function setUpuShortcut(?string $upuShortcut): self
    {
        $this->upuShortcut = $upuShortcut;

        return $this;
    }

    public function getIso3166(): ?string
    {
        return $this->iso3166;
    }

    public function setIso3166(?string $iso3166): self
    {
        $this->iso3166 = $iso3166;

        return $this;
    }

    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    public function setEmoji(?string $emoji): self
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressFormat()
    {
        return $this->addressFormat;
    }

    /**
     * @param mixed $addressFormat
     */
    public function setAddressFormat($addressFormat): void
    {
        $this->addressFormat = $addressFormat;
    }

    /**
     * @return Collection|Provider[]
     */
    public function getProviders(): Collection
    {
        return $this->providers;
    }

    public function addProvider(Provider $provider): self
    {
        if (!$this->providers->contains($provider)) {
            $this->providers[] = $provider;
            $provider->setTerritory($this);
        }

        return $this;
    }

    public function removeProvider(Provider $provider): self
    {
        if ($this->providers->removeElement($provider)) {
            // set the owning side to null (unless already changed)
            if ($provider->getTerritory() === $this) {
                $provider->setTerritory(null);
            }
        }

        return $this;
    }
}
