<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SecurityRepository")
 */
class Security
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
    private $Password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ChangePass;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="security", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getChangePass(): ?bool
    {
        return $this->ChangePass;
    }

    public function setChangePass(bool $ChangePass): self
    {
        $this->ChangePass = $ChangePass;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_User;
    }

    public function setIdUser(User $id_User): self
    {
        $this->id_User = $id_User;

        return $this;
    }
}
