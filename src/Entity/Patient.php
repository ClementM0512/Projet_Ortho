<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $optnClasse;

    /**
     * @ORM\Column(type="text")
     */
    private $antecedent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autreBilan;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $charge;

    /**
     * @ORM\Column(type="text")
     */
    private $traitement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lateralite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motifs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bilan", mappedBy="patient")
     */
    private $bilans;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultat", mappedBy="id_Patient", orphanRemoval=true)
     */
    private $resultats;

    public function __construct()
    {
        $this->bilans = new ArrayCollection();
        $this->resultats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getOptnClasse(): ?string
    {
        return $this->optnClasse;
    }
    
    public function setOptnClasse(string $optnClasse): self
    {
        $this->optnClasse = $optnClasse;

        return $this;
    }

    public function getAntecedent(): ?string
    {
        return $this->antecedent;
    }

    public function setAntecedent(string $antecedent): self
    {
        $this->antecedent = $antecedent;

        return $this;
    }

    public function getAutreBilan(): ?string
    {
        return $this->autreBilan;
    }

    public function setAutreBilan(string $autreBilan): self
    {
        $this->autreBilan = $autreBilan;

        return $this;
    }

    public function getCharge(): ?string
    {
        return $this->charge;
    }

    public function setCharge(string $charge): self
    {
        $this->charge = $charge;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(string $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getLateralite(): ?string
    {
        return $this->lateralite;
    }

    public function setLateralite(string $lateralite): self
    {
        $this->lateralite = $lateralite;

        return $this;
    }

    public function getMotifs(): ?string
    {
        return $this->motifs;
    }

    public function setMotifs(string $motifs): self
    {
        $this->motifs = $motifs;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Bilan[]
     */
    public function getBilans(): Collection
    {
        return $this->bilans;
    }

    public function addBilan(Bilan $bilan): self
    {
        if (!$this->bilans->contains($bilan)) {
            $this->bilans[] = $bilan;
            $bilan->setPatient($this);
        }

        return $this;
    }

    public function removeBilan(Bilan $bilan): self
    {
        if ($this->bilans->contains($bilan)) {
            $this->bilans->removeElement($bilan);
            // set the owning side to null (unless already changed)
            if ($bilan->getPatient() === $this) {
                $bilan->setPatient(null);
            }
        }

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
            $resultat->setIdPatient($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): self
    {
        if ($this->resultats->contains($resultat)) {
            $this->resultats->removeElement($resultat);
            // set the owning side to null (unless already changed)
            if ($resultat->getIdPatient() === $this) {
                $resultat->setIdPatient(null);
            }
        }

        return $this;
    }
}
