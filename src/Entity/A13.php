<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\A13Repository")
 */
class A13
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
    private $Age_Equiv;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EH;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PS;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CO;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FG;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SR;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VC;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VMS;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FC;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgeEquiv(): ?string
    {
        return $this->Age_Equiv;
    }

    public function setAgeEquiv(string $Age_Equiv): self
    {
        $this->Age_Equiv = $Age_Equiv;

        return $this;
    }

    public function getPS(): ?string
    {
        return $this->PS;
    }

    public function setPS(string $PS): self
    {
        $this->PS = $PS;

        return $this;
    }

    public function getEH(): ?string
    {
        return $this->EH;
    }

    public function setEH(string $EH): self
    {
        $this->EH = $EH;

        return $this;
    }

    public function getCO(): ?string
    {
        return $this->CO;
    }

    public function setCO(string $CO): self
    {
        $this->CO = $CO;

        return $this;
    }

    public function getFG(): ?string
    {
        return $this->FG;
    }

    public function setFG(string $FG): self
    {
        $this->FG = $FG;

        return $this;
    }

    public function getSR(): ?string
    {
        return $this->SR;
    }

    public function setSR(string $SR): self
    {
        $this->SR = $SR;

        return $this;
    }

    public function getVC(): ?string
    {
        return $this->VC;
    }

    public function setVC(string $VC): self
    {
        $this->VC = $VC;

        return $this;
    }

    public function getVMS(): ?string
    {
        return $this->VMS;
    }

    public function setVMS(string $VMS): self
    {
        $this->VMS = $VMS;

        return $this;
    }

    public function getFC(): ?string
    {
        return $this->FC;
    }

    public function setFC(string $FC): self
    {
        $this->FC = $FC;

        return $this;
    }
}
