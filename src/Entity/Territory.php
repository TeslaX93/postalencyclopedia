<?php

namespace App\Entity;

use App\Repository\TerritoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\String\Slugger\AsciiSlugger;
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
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $nameFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $nameLocal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $fullname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $fullnameFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $fullnameLocal;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isDepended;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isRecognized;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $templateFormat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $postalCodeFormat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $addressFormat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $addressLocation;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private ?string $upuShortcut;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private ?string $iso3166;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private ?string $emoji;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Provider::class, mappedBy="territories")
     */
    private $providers;

    /**
     * @ORM\OneToMany(targetEntity=Province::class, mappedBy="territory", orphanRemoval=true)
     */
    private $provinces;

    public function __construct()
    {
        $this->providers = new ArrayCollection();
        $this->provinces = new ArrayCollection();
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

    public function getIsDepended(): ?bool
    {
        return $this->isDepended;
    }

    public function setIsDepended(bool $isDepended): self
    {
        $this->isDepended = $isDepended;

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

    public function setTemplateFormat(?string $templateFormat): self
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

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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


    public function __toString(): string
    {
        return $this->name;
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
            $provider->addTerritory($this);
        }

        return $this;
    }

    public function removeProvider(Provider $provider): self
    {
        if ($this->providers->removeElement($provider)) {
            $provider->removeTerritory($this);
        }

        return $this;
    }

    /**
     * @return Collection|Province[]
     */
    public function getProvinces(): Collection
    {
        return $this->provinces;
    }

    public function addProvince(Province $province): self
    {
        if (!$this->provinces->contains($province)) {
            $this->provinces[] = $province;
            $province->setTerritory($this);
        }

        return $this;
    }

    public function removeProvince(Province $province): self
    {
        if ($this->provinces->removeElement($province)) {
            // set the owning side to null (unless already changed)
            if ($province->getTerritory() === $this) {
                $province->setTerritory(null);
            }
        }

        return $this;
    }
}
