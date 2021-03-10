<?php

namespace App\Entity;

use App\Repository\ParoisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ParoisseRepository::class)
 */
class Paroisse
{
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     */
    private $nomParoisse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseParoisse;

    /**
     * @ORM\OneToMany(targetEntity=Servant::class, mappedBy="paroisseServant")
     */
    private $servants;

    /**
     * @ORM\ManyToOne(targetEntity=SubdivisionEcclesiastique::class, inversedBy="paroisses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subdivisionEcclesiastique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $abbreviationParoisse;

    public function __construct()
    {
        $this->servants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomParoisse(): ?string
    {
        return $this->nomParoisse;
    }

    public function setNomParoisse(string $nomParoisse): self
    {
        $this->nomParoisse = $nomParoisse;

        return $this;
    }

    public function getAdresseParoisse(): ?string
    {
        return $this->adresseParoisse;
    }

    public function setAdresseParoisse(?string $adresseParoisse): self
    {
        $this->adresseParoisse = $adresseParoisse;

        return $this;
    }

    /**
     * @return Collection|Servant[]
     */
    public function getServants(): Collection
    {
        return $this->servants;
    }

    public function addServant(Servant $servant): self
    {
        if (!$this->servants->contains($servant)) {
            $this->servants[] = $servant;
            $servant->setParoisseServant($this);
        }

        return $this;
    }

    public function removeServant(Servant $servant): self
    {
        if ($this->servants->removeElement($servant)) {
            // set the owning side to null (unless already changed)
            if ($servant->getParoisseServant() === $this) {
                $servant->setParoisseServant(null);
            }
        }

        return $this;
    }

    public function getSubdivisionEcclesiastique(): ?SubdivisionEcclesiastique
    {
        return $this->subdivisionEcclesiastique;
    }

    public function setSubdivisionEcclesiastique(?SubdivisionEcclesiastique $subdivisionEcclesiastique): self
    {
        $this->subdivisionEcclesiastique = $subdivisionEcclesiastique;

        return $this;
    }

    public function getAbbreviationParoisse(): ?string
    {
        return $this->abbreviationParoisse;
    }

    public function setAbbreviationParoisse(?string $abbreviationParoisse): self
    {
        $this->abbreviationParoisse = $abbreviationParoisse;

        return $this;
    }
}
