<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
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
    private $screenShoot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkUrl;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Technologie", inversedBy="projects")
     */
    private $technologies;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OtherScreenshoot", mappedBy="screenShoot")
     */
    private $otherScreenshoots;

    public function __construct()
    {
        $this->technologies = new ArrayCollection();
        $this->otherScreenshoots = new ArrayCollection();
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

    public function getScreenShoot(): ?string
    {
        return $this->screenShoot;
    }

    public function setScreenShoot(?string $screenShoot): self
    {
        $this->screenShoot = $screenShoot;

        return $this;
    }

    public function getLinkUrl(): ?string
    {
        return $this->linkUrl;
    }

    public function setLinkUrl(?string $linkUrl): self
    {
        $this->linkUrl = $linkUrl;

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

    /**
     * @return Collection|Technologie[]
     */
    public function getTechnologies(): Collection
    {
        return $this->technologies;
    }

    public function addTechnology(Technologie $technology): self
    {
        if (!$this->technologies->contains($technology)) {
            $this->technologies[] = $technology;
        }

        return $this;
    }

    public function removeTechnology(Technologie $technology): self
    {
        if ($this->technologies->contains($technology)) {
            $this->technologies->removeElement($technology);
        }

        return $this;
    }

    /**
     * @return Collection|OtherScreenshoot[]
     */
    public function getOtherScreenshoots(): Collection
    {
        return $this->otherScreenshoots;
    }

    public function addOtherScreenshoot(OtherScreenshoot $otherScreenshoot): self
    {
        if (!$this->otherScreenshoots->contains($otherScreenshoot)) {
            $this->otherScreenshoots[] = $otherScreenshoot;
            $otherScreenshoot->setScreenShoot($this);
        }

        return $this;
    }

    public function removeOtherScreenshoot(OtherScreenshoot $otherScreenshoot): self
    {
        if ($this->otherScreenshoots->contains($otherScreenshoot)) {
            $this->otherScreenshoots->removeElement($otherScreenshoot);
            // set the owning side to null (unless already changed)
            if ($otherScreenshoot->getScreenShoot() === $this) {
                $otherScreenshoot->setScreenShoot(null);
            }
        }

        return $this;
    }
}
