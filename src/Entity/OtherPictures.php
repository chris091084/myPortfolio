<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OtherPicturesRepository")
 */
class OtherPictures
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projects", inversedBy="otherPictures")
     */
    private $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?Projects
    {
        return $this->picture;
    }

    public function setPicture(?Projects $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
