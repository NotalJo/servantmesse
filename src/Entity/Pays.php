<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
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
    private $nomPays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCardinale;

    /**
     * @ORM\OneToMany(targetEntity=Archidiocese::class, mappedBy="pays")
     */
    private $archidioceses;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->archidioceses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(string $nomPays): self
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    public function getNomCardinale(): ?string
    {
        return $this->nomCardinale;
    }

    public function setNomCardinale(string $nomCardinale): self
    {
        $this->nomCardinale = $nomCardinale;

        return $this;
    }

    /**
     * @return Collection|Archidiocese[]
     */
    public function getArchidioceses(): Collection
    {
        return $this->archidioceses;
    }

    public function addArchidiocese(Archidiocese $archidiocese): self
    {
        if (!$this->archidioceses->contains($archidiocese)) {
            $this->archidioceses[] = $archidiocese;
            $archidiocese->setPays($this);
        }

        return $this;
    }

    public function removeArchidiocese(Archidiocese $archidiocese): self
    {
        if ($this->archidioceses->removeElement($archidiocese)) {
            // set the owning side to null (unless already changed)
            if ($archidiocese->getPays() === $this) {
                $archidiocese->setPays(null);
            }
        }

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
