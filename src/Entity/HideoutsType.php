<?php

namespace App\Entity;

use App\Repository\HideoutsTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HideoutsTypeRepository::class)
 */
class HideoutsType
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
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Hideouts::class, mappedBy="type")
     */
    private $Hideouts;

    public function __construct()
    {
        $this->Hideouts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Hideouts[]
     */
    public function getHideouts(): Collection
    {
        return $this->Hideouts;
    }

    public function addHideout(Hideouts $hideout): self
    {
        if (!$this->Hideouts->contains($hideout)) {
            $this->Hideouts[] = $hideout;
            $hideout->setType($this);
        }

        return $this;
    }

    public function removeHideout(Hideouts $hideout): self
    {
        if ($this->Hideouts->removeElement($hideout)) {
            // set the owning side to null (unless already changed)
            if ($hideout->getType() === $this) {
                $hideout->setType(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->getDescription();
    }
}
