<?php

namespace App\Entity;

use App\Repository\ServantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServantRepository::class)
 */
class Servant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoServant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomServant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomServant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseServant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fonctionServant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $centreInteret;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAdhesion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupeServant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pereServant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mereServant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mailServant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fbServant;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $contactOrange;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $contactTelma;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $contactAirtel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateBapteme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paroisseBapteme;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateCommunion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paroisseCommunion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateConfirmation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paroisseConfirmation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $referenceServant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etatBadge;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeQR;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Paroisse::class, inversedBy="servants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paroisseServant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoServant(): ?string
    {
        return $this->photoServant;
    }

    public function setPhotoServant(?string $photoServant): self
    {
        $this->photoServant = $photoServant;

        return $this;
    }

    public function getNomServant(): ?string
    {
        return $this->nomServant;
    }

    public function setNomServant(?string $nomServant): self
    {
        $this->nomServant = $nomServant;

        return $this;
    }

    public function getPrenomServant(): ?string
    {
        return $this->prenomServant;
    }

    public function setPrenomServant(?string $prenomServant): self
    {
        $this->prenomServant = $prenomServant;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getAdresseServant(): ?string
    {
        return $this->adresseServant;
    }

    public function setAdresseServant(?string $adresseServant): self
    {
        $this->adresseServant = $adresseServant;

        return $this;
    }

    public function getFonctionServant(): ?string
    {
        return $this->fonctionServant;
    }

    public function setFonctionServant(?string $fonctionServant): self
    {
        $this->fonctionServant = $fonctionServant;

        return $this;
    }

    public function getCentreInteret(): ?string
    {
        return $this->centreInteret;
    }

    public function setCentreInteret(?string $centreInteret): self
    {
        $this->centreInteret = $centreInteret;

        return $this;
    }

    public function getDateAdhesion(): ?\DateTimeInterface
    {
        return $this->dateAdhesion;
    }

    public function setDateAdhesion(\DateTimeInterface $dateAdhesion): self
    {
        $this->dateAdhesion = $dateAdhesion;

        return $this;
    }

    public function getGroupeServant(): ?string
    {
        return $this->groupeServant;
    }

    public function setGroupeServant(?string $groupeServant): self
    {
        $this->groupeServant = $groupeServant;

        return $this;
    }

    public function getPereServant(): ?string
    {
        return $this->pereServant;
    }

    public function setPereServant(?string $pereServant): self
    {
        $this->pereServant = $pereServant;

        return $this;
    }

    public function getMereServant(): ?string
    {
        return $this->mereServant;
    }

    public function setMereServant(?string $mereServant): self
    {
        $this->mereServant = $mereServant;

        return $this;
    }

    public function getMailServant(): ?string
    {
        return $this->mailServant;
    }

    public function setMailServant(?string $mailServant): self
    {
        $this->mailServant = $mailServant;

        return $this;
    }

    public function getFbServant(): ?string
    {
        return $this->fbServant;
    }

    public function setFbServant(?string $fbServant): self
    {
        $this->fbServant = $fbServant;

        return $this;
    }

    public function getContactOrange(): ?string
    {
        return $this->contactOrange;
    }

    public function setContactOrange(?string $contactOrange): self
    {
        $this->contactOrange = $contactOrange;

        return $this;
    }

    public function getContactTelma(): ?string
    {
        return $this->contactTelma;
    }

    public function setContactTelma(?string $contactTelma): self
    {
        $this->contactTelma = $contactTelma;

        return $this;
    }

    public function getContactAirtel(): ?string
    {
        return $this->contactAirtel;
    }

    public function setContactAirtel(?string $contactAirtel): self
    {
        $this->contactAirtel = $contactAirtel;

        return $this;
    }

    public function getDateBapteme(): ?\DateTimeInterface
    {
        return $this->dateBapteme;
    }

    public function setDateBapteme(?\DateTimeInterface $dateBapteme): self
    {
        $this->dateBapteme = $dateBapteme;

        return $this;
    }

    public function getParoisseBapteme(): ?string
    {
        return $this->paroisseBapteme;
    }

    public function setParoisseBapteme(?string $paroisseBapteme): self
    {
        $this->paroisseBapteme = $paroisseBapteme;

        return $this;
    }

    public function getDateCommunion(): ?\DateTimeInterface
    {
        return $this->dateCommunion;
    }

    public function setDateCommunion(?\DateTimeInterface $dateCommunion): self
    {
        $this->dateCommunion = $dateCommunion;

        return $this;
    }

    public function getParoisseCommunion(): ?string
    {
        return $this->paroisseCommunion;
    }

    public function setParoisseCommunion(?string $paroisseCommunion): self
    {
        $this->paroisseCommunion = $paroisseCommunion;

        return $this;
    }

    public function getDateConfirmation(): ?\DateTimeInterface
    {
        return $this->dateConfirmation;
    }

    public function setDateConfirmation(?\DateTimeInterface $dateConfirmation): self
    {
        $this->dateConfirmation = $dateConfirmation;

        return $this;
    }

    public function getParoisseConfirmation(): ?string
    {
        return $this->paroisseConfirmation;
    }

    public function setParoisseConfirmation(?string $paroisseConfirmation): self
    {
        $this->paroisseConfirmation = $paroisseConfirmation;

        return $this;
    }

    public function getReferenceServant(): ?string
    {
        return $this->referenceServant;
    }

    public function setReferenceServant(string $referenceServant): self
    {
        $this->referenceServant = $referenceServant;

        return $this;
    }

    public function getEtatBadge(): ?bool
    {
        return $this->etatBadge;
    }

    public function setEtatBadge(bool $etatBadge): self
    {
        $this->etatBadge = $etatBadge;

        return $this;
    }

    public function getCodeQR(): ?string
    {
        return $this->codeQR;
    }

    public function setCodeQR(?string $codeQR): self
    {
        $this->codeQR = $codeQR;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getParoisseServant(): ?Paroisse
    {
        return $this->paroisseServant;
    }

    public function setParoisseServant(?Paroisse $paroisseServant): self
    {
        $this->paroisseServant = $paroisseServant;

        return $this;
    }
}
