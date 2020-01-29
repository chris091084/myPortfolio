<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsRepository")
 */
class Projects
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pitcture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Technologies", mappedBy="picture")
     */
    private $technologies;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OtherPictures", mappedBy="picture")
     */
    private $otherPictures;

    public function __construct()
    {
        $this->technologies = new ArrayCollection();
        $this->otherPictures = new ArrayCollection();
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

    public function getPitcture(): ?string
    {
        return $this->pitcture;
    }

    public function setPitcture(?string $pitcture): self
    {
        $this->pitcture = $pitcture;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection|Technologies[]
     */
    public function getTechnologies(): Collection
    {
        return $this->technologies;
    }

    public function addTechnology(Technologies $technology): self
    {
        if (!$this->technologies->contains($technology)) {
            $this->technologies[] = $technology;
            $technology->addPicture($this);
        }

        return $this;
    }

    public function removeTechnology(Technologies $technology): self
    {
        if ($this->technologies->contains($technology)) {
            $this->technologies->removeElement($technology);
            $technology->removePicture($this);
        }

        return $this;
    }

    /**
     * @return Collection|OtherPictures[]
     */
    public function getOtherPictures(): Collection
    {
        return $this->otherPictures;
    }

    public function addOtherPicture(OtherPictures $otherPicture): self
    {
        if (!$this->otherPictures->contains($otherPicture)) {
            $this->otherPictures[] = $otherPicture;
            $otherPicture->setPicture($this);
        }

        return $this;
    }

    public function removeOtherPicture(OtherPictures $otherPicture): self
    {
        if ($this->otherPictures->contains($otherPicture)) {
            $this->otherPictures->removeElement($otherPicture);
            // set the owning side to null (unless already changed)
            if ($otherPicture->getPicture() === $this) {
                $otherPicture->setPicture(null);
            }
        }

        return $this;
    }

}
