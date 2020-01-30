<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailFormation", mappedBy="formation")
     */
    private $detailsFormation;

    public function __construct()
    {
        $this->detailsFormation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|DetailFormation[]
     */
    public function getDetailsFormation(): Collection
    {
        return $this->detailsFormation;
    }

    public function addDetailsFormation(DetailFormation $detailsFormation): self
    {
        if (!$this->detailsFormation->contains($detailsFormation)) {
            $this->detailsFormation[] = $detailsFormation;
            $detailsFormation->setFormation($this);
        }

        return $this;
    }

    public function removeDetailsFormation(DetailFormation $detailsFormation): self
    {
        if ($this->detailsFormation->contains($detailsFormation)) {
            $this->detailsFormation->removeElement($detailsFormation);
            // set the owning side to null (unless already changed)
            if ($detailsFormation->getFormation() === $this) {
                $detailsFormation->setFormation(null);
            }
        }

        return $this;
    }
}
