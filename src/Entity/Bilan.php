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
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $corrections;

    /**     corrections: od, og
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allC;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $optotypes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $echelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $affichages;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $distance;

    /**      acuité visuelle loin: od, og, odg
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allVL;

    /**      acuité visuelle près: od, og, odg
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allVP;

    /**     PlusOptix: od,og
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allPO;

    // /**
    //  * @ORM\Column(type="string", length=255, nullable=true)
    //  */
    // private $distance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contrastes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accomodation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $confrontation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fixation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="bilans")
     */
    private $patient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultat", mappedBy="id_Bilan")
     */
    private $resultats;



    public function __construct()
    {
        $this->patient = new ArrayCollection();
        $this->resultats = new ArrayCollection();
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

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * @return Collection|Resultat[]
     */
    public function getResultats(): Collection
    {
        return $this->resultats;
    }

    public function addResultat(Resultat $resultat): self
    {
        if (!$this->resultats->contains($resultat)) {
            $this->resultats[] = $resultat;
            $resultat->setIdBilan($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): self
    {
        if ($this->resultats->contains($resultat)) {
            $this->resultats->removeElement($resultat);
            // set the owning side to null (unless already changed)
            if ($resultat->getIdBilan() === $this) {
                $resultat->setIdBilan(null);
            }
        }

        return $this;
    }


}
