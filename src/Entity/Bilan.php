<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BilanRepository")
 */
class Bilan
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $od;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $og;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Patient")
     */
    private $patient;

    public function __construct()
    {
        $this->patient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOd(): ?string
    {
        return $this->od;
    }

    public function setOd(?string $od): self
    {
        $this->od = $od;

        return $this;
    }

    public function getOg(): ?string
    {
        return $this->og;
    }

    public function setOg(?string $og): self
    {
        $this->og = $og;

        return $this;
    }

    /**
     * @return Collection|Patient[]
     */
    public function getPatient(): Collection
    {
        return $this->patient;
    }

    public function addPatient(Patient $patient): self
    {
        if (!$this->patient->contains($patient)) {
            $this->patient[] = $patient;
            $patient->setBilan($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): self
    {
        if ($this->patient->contains($patient)) {
            $this->patient->removeElement($patient);
            // set the owning side to null (unless already changed)
            if ($patient->getBilan() === $this) {
                $patient->setBilan(null);
            }
        }

        return $this;
    }
}
