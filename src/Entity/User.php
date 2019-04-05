<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"Username"}, message="There is already an account with this username")
 */
class User implements UserInterface
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
    private $Nom;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Permission", mappedBy="id_User", cascade={"persist", "remove"})
     */
    private $permission;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Security", mappedBy="id_User", cascade={"persist", "remove"})
     */
    private $security;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    } 
    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }
    
    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;
        
        return $this;
    }
    public function getUsername(): ?string
    {
        return $this->Username;
    }
    
    public function setUsername(string $Username): self
    {
        $this->Username = $Username;
        
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->getPermission()->getRoles();
    }
    public function getPassword(): ?string
    {
        return $this->getSecurity()->getPassword();
    }
    
    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }
    
    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPermission(): ?Permission
    {
        return $this->permission;
    }

    public function setPermission(Permission $permission): self
    {
        $this->permission = $permission;

        // set the owning side of the relation if necessary
        if ($this !== $permission->getIdUser()) {
            $permission->setIdUser($this);
        }

        return $this;
    }

    public function getSecurity(): ?Security
    {
        return $this->security;
    }

    public function setSecurity(Security $security): self
    {
        $this->security = $security;

        // set the owning side of the relation if necessary
        if ($this !== $security->getIdUser()) {
            $security->setIdUser($this);
        }

        return $this;
    }
}
