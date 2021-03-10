<?php

namespace App\Entity;

use App\Repository\DioceseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DioceseRepository::class)
 */
class Diocese
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
    private $nomDiocese;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     */
    private $evequeActuelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vicaireGenerale;

    /**
     * @ORM\OneToMany(targetEntity=SubdivisionEcclesiastique::class, mappedBy="dioceseSubdivision")
     */
    private $subdivisions;

    /**
     * @ORM\ManyToOne(targetEntity=Archidiocese::class, inversedBy="dioceses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $archidiocese;

    public function __construct()
    {
        $this->subdivisions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDiocese(): ?string
    {
        return $this->nomDiocese;
    }

    public function setNomDiocese(string $nomDiocese): self
    {
        $this->nomDiocese = $nomDiocese;

        return $this;
    }

    public function getEvequeActuelle(): ?string
    {
        return $this->evequeActuelle;
    }

    public function setEvequeActuelle(string $evequeActuelle): self
    {
        $this->evequeActuelle = $evequeActuelle;

        return $this;
    }

    public function getVicaireGenerale(): ?string
    {
        return $this->vicaireGenerale;
    }

    public function setVicaireGenerale(?string $vicaireGenerale): self
    {
        $this->vicaireGenerale = $vicaireGenerale;

        return $this;
    }

    /**
     * @return Collection|SubdivisionEcclesiastique[]
     */
    public function getSubdivisions(): Collection
    {
        return $this->subdivisions;
    }

    public function addSubdivision(SubdivisionEcclesiastique $subdivision): self
    {
        if (!$this->subdivisions->contains($subdivision)) {
            $this->subdivisions[] = $subdivision;
            $subdivision->setDioceseSubdivision($this);
        }

        return $this;
    }

    public function removeSubdivision(SubdivisionEcclesiastique $subdivision): self
    {
        if ($this->subdivisions->removeElement($subdivision)) {
            // set the owning side to null (unless already changed)
            if ($subdivision->getDioceseSubdivision() === $this) {
                $subdivision->setDioceseSubdivision(null);
            }
        }

        return $this;
    }

    public function getArchidiocese(): ?Archidiocese
    {
        return $this->archidiocese;
    }

    public function setArchidiocese(?Archidiocese $archidiocese): self
    {
        $this->archidiocese = $archidiocese;

        return $this;
    }

}
