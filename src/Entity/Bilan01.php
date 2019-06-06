<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Bilan01Repository")
 */
class Bilan01
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $corrections;

    /**
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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allVL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allVP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allPO;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stereoscopique;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="bilan01s")
     */
    private $patient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultat", mappedBy="bilan01")
     */
    private $resultats;

    public function __construct()
    {
        $this->resultats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorrections(): ?bool
    {
        return $this->corrections;
    }

    public function setCorrections(bool $corrections): self
    {
        $this->corrections = $corrections;

        return $this;
    }

    public function getAllC(): ?string
    {
        return $this->allC;
    }

    public function setAllC(?string $allC): self
    {
        $this->allC = $allC;

        return $this;
    }

    public function getOptotypes(): ?string
    {
        return $this->optotypes;
    }

    public function setOptotypes(?string $optotypes): self
    {
        $this->optotypes = $optotypes;

        return $this;
    }

    public function getEchelle(): ?string
    {
        return $this->echelle;
    }

    public function setEchelle(?string $echelle): self
    {
        $this->echelle = $echelle;

        return $this;
    }

    public function getAffichages(): ?string
    {
        return $this->affichages;
    }

    public function setAffichages(?string $affichages): self
    {
        $this->affichages = $affichages;

        return $this;
    }

    public function getDistance(): ?string
    {
        return $this->distance;
    }

    public function setDistance(?string $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getAllVL(): ?string
    {
        return $this->allVL;
    }

    public function setAllVL(?string $allVL): self
    {
        $this->allVL = $allVL;

        return $this;
    }

    public function getAllVP(): ?string
    {
        return $this->allVP;
    }

    public function setAllVP(?string $allVP): self
    {
        $this->allVP = $allVP;

        return $this;
    }

    public function getAllPO(): ?string
    {
        return $this->allPO;
    }

    public function setAllPO(?string $allPO): self
    {
        $this->allPO = $allPO;

        return $this;
    }

    public function getStereoscopique(): ?string
    {
        return $this->stereoscopique;
    }

    public function setStereoscopique(?string $stereoscopique): self
    {
        $this->stereoscopique = $stereoscopique;

        return $this;
    }

    public function getCouleurs(): ?string
    {
        return $this->couleurs;
    }

    public function setCouleurs(?string $couleurs): self
    {
        $this->couleurs = $couleurs;

        return $this;
    }

    public function getContrastes(): ?string
    {
        return $this->contrastes;
    }

    public function setContrastes(?string $contrastes): self
    {
        $this->contrastes = $contrastes;

        return $this;
    }

    public function getAccomodation(): ?string
    {
        return $this->accomodation;
    }

    public function setAccomodation(?string $accomodation): self
    {
        $this->accomodation = $accomodation;

        return $this;
    }

    public function getConfrontation(): ?string
    {
        return $this->confrontation;
    }

    public function setConfrontation(?string $confrontation): self
    {
        $this->confrontation = $confrontation;

        return $this;
    }

    public function getFixation(): ?string
    {
        return $this->fixation;
    }

    public function setFixation(?string $fixation): self
    {
        $this->fixation = $fixation;

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
            $resultat->setBilan01($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): self
    {
        if ($this->resultats->contains($resultat)) {
            $this->resultats->removeElement($resultat);
            // set the owning side to null (unless already changed)
            if ($resultat->getBilan01() === $this) {
                $resultat->setBilan01(null);
            }
        }

        return $this;
    }
}
