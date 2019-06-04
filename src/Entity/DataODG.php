<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DataODGRepository")
 */
class DataODG
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ODG;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getODG(): ?string
    {
        return $this->ODG;
    }

    public function setODG(string $ODG): self
    {
        $this->ODG = $ODG;

        return $this;
    }
}
