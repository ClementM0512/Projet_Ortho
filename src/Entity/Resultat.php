<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultatRepository")
 */
class Resultat
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
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Exercice", inversedBy="resultats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_Exercice;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="resultats")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_Patient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bilan", inversedBy="resultats")
     */
    private $id_Bilan;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bilan01", inversedBy="resultats")
     */
    private $bilan01;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getIdExercice(): ?Exercice
    {
        return $this->id_Exercice;
    }

    public function setIdExercice(?Exercice $id_Exercice): self
    {
        $this->id_Exercice = $id_Exercice;

        return $this;
    }

    public function getIdPatient(): ?Patient
    {
        return $this->id_Patient;
    }

    public function setIdPatient(?Patient $id_Patient): self
    {
        $this->id_Patient = $id_Patient;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_User;
    }

    public function setIdUser(?User $id_User): self
    {
        $this->id_User = $id_User;

        return $this;
    }

    public function getIdBilan(): ?Bilan
    {
        return $this->id_Bilan;
    }

    public function setIdBilan(?Bilan $id_Bilan): self
    {
        $this->id_Bilan = $id_Bilan;

        return $this;
    }

    public function getBilan01(): ?Bilan01
    {
        return $this->bilan01;
    }

    public function setBilan01(?Bilan01 $bilan01): self
    {
        $this->bilan01 = $bilan01;

        return $this;
    }
}
