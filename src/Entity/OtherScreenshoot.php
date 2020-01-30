<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OtherScreenshootRepository")
 */
class OtherScreenshoot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="otherScreenshoots")
     */
    private $screenShoot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScreenShoot(): ?Project
    {
        return $this->screenShoot;
    }

    public function setScreenShoot(?Project $screenShoot): self
    {
        $this->screenShoot = $screenShoot;

        return $this;
    }
}
