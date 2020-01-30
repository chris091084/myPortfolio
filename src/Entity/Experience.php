<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 */
class Experience
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ayear;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailExp", mappedBy="experience")
     */
    private $detailsExp;

    public function __construct()
    {
        $this->detailsExp = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAyear(): ?string
    {
        return $this->ayear;
    }

    public function setAyear(string $ayear): self
    {
        $this->ayear = $ayear;

        return $this;
    }

    /**
     * @return Collection|DetailExp[]
     */
    public function getDetailsExp(): Collection
    {
        return $this->detailsExp;
    }

    public function addDetailsExp(DetailExp $detailsExp): self
    {
        if (!$this->detailsExp->contains($detailsExp)) {
            $this->detailsExp[] = $detailsExp;
            $detailsExp->setExperience($this);
        }

        return $this;
    }

    public function removeDetailsExp(DetailExp $detailsExp): self
    {
        if ($this->detailsExp->contains($detailsExp)) {
            $this->detailsExp->removeElement($detailsExp);
            // set the owning side to null (unless already changed)
            if ($detailsExp->getExperience() === $this) {
                $detailsExp->setExperience(null);
            }
        }

        return $this;
    }
}
