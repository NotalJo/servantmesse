<?php

namespace App\Entity;

use App\Repository\ArchidioceseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArchidioceseRepository::class)
 */
class Archidiocese
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomArchidiocese;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * * @Assert\NotNull
     */
    private $nomArcheveque;

    /**
     * @ORM\OneToMany(targetEntity=Diocese::class, mappedBy="archidiocese")
     */
    private $dioceses;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="archidioceses")
     * * @Assert\NotNull
     */
    private $pays;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->dioceses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArchidiocese(): ?string
    {
        return $this->nomArchidiocese;
    }

    public function setNomArchidiocese(string $nomArchidiocese): self
    {
        $this->nomArchidiocese = $nomArchidiocese;

        return $this;
    }

    public function getNomArcheveque(): ?string
    {
        return $this->nomArcheveque;
    }

    public function setNomArcheveque(?string $nomArcheveque): self
    {
        $this->nomArcheveque = $nomArcheveque;

        return $this;
    }

    /**
     * @return Collection|Diocese[]
     */
    public function getDioceses(): Collection
    {
        return $this->dioceses;
    }

    public function addDiocese(Diocese $diocese): self
    {
        if (!$this->dioceses->contains($diocese)) {
            $this->dioceses[] = $diocese;
            $diocese->setArchidiocese($this);
        }

        return $this;
    }

    public function removeDiocese(Diocese $diocese): self
    {
        if ($this->dioceses->removeElement($diocese)) {
            // set the owning side to null (unless already changed)
            if ($diocese->getArchidiocese() === $this) {
                $diocese->setArchidiocese(null);
            }
        }

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
