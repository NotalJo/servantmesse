<?php

namespace App\Entity;

use App\Repository\SubdivisionEcclesiastiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubdivisionEcclesiastiqueRepository::class)
 */
class SubdivisionEcclesiastique
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
    private $nomSubdivision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveauSubdivision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuSubdivision;

    /**
     * @ORM\OneToMany(targetEntity=Paroisse::class, mappedBy="subdivisionEcclesiastique")
     */
    private $paroisses;

    /**
     * @ORM\ManyToOne(targetEntity=Diocese::class, inversedBy="subdivisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dioceseSubdivision;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->paroisses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSubdivision(): ?string
    {
        return $this->nomSubdivision;
    }

    public function setNomSubdivision(string $nomSubdivision): self
    {
        $this->nomSubdivision = $nomSubdivision;

        return $this;
    }

    public function getNiveauSubdivision(): ?string
    {
        return $this->niveauSubdivision;
    }

    public function setNiveauSubdivision(string $niveauSubdivision): self
    {
        $this->niveauSubdivision = $niveauSubdivision;

        return $this;
    }

    public function getLieuSubdivision(): ?string
    {
        return $this->lieuSubdivision;
    }

    public function setLieuSubdivision(string $lieuSubdivision): self
    {
        $this->lieuSubdivision = $lieuSubdivision;

        return $this;
    }

    /**
     * @return Collection|Paroisse[]
     */
    public function getParoisses(): Collection
    {
        return $this->paroisses;
    }

    public function addParoiss(Paroisse $paroiss): self
    {
        if (!$this->paroisses->contains($paroiss)) {
            $this->paroisses[] = $paroiss;
            $paroiss->setSubdivisionEcclesiastique($this);
        }

        return $this;
    }

    public function removeParoiss(Paroisse $paroiss): self
    {
        if ($this->paroisses->removeElement($paroiss)) {
            // set the owning side to null (unless already changed)
            if ($paroiss->getSubdivisionEcclesiastique() === $this) {
                $paroiss->setSubdivisionEcclesiastique(null);
            }
        }

        return $this;
    }

    public function getDioceseSubdivision(): ?Diocese
    {
        return $this->dioceseSubdivision;
    }

    public function setDioceseSubdivision(?Diocese $dioceseSubdivision): self
    {
        $this->dioceseSubdivision = $dioceseSubdivision;

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
