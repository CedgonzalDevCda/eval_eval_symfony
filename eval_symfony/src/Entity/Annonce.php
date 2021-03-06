<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $model;

    #[ORM\Column(type: 'string', length: 255)]
    private $brand;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\Column(type: 'date')]
    private $year;

    #[ORM\Column(type: 'string', length: 255)]
    private $fuel;

    #[ORM\Column(type: 'boolean')]
    private $drivinglicence;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photo;

    #[ORM\Column(type: 'integer')]
    private $kilometers;

    #[ORM\OneToMany(mappedBy: 'annonces', targetEntity: UserListByAnnonce::class)]
    private $userListByAnnonces;

    #[ORM\Column(type: 'string', length: 255)]
    private $author;

    public function __construct()
    {
        $this->userListByAnnonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getDrivinglicence(): ?bool
    {
        return $this->drivinglicence;
    }

    public function setDrivinglicence(bool $drivinglicence): self
    {
        $this->drivinglicence = $drivinglicence;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    public function setKilometers(int $kilometers): self
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    /**
     * @return Collection<int, UserListByAnnonce>
     */
    public function getUserListByAnnonces(): Collection
    {
        return $this->userListByAnnonces;
    }

    public function addUserListByAnnonce(UserListByAnnonce $userListByAnnonce): self
    {
        if (!$this->userListByAnnonces->contains($userListByAnnonce)) {
            $this->userListByAnnonces[] = $userListByAnnonce;
            $userListByAnnonce->setAnnonces($this);
        }

        return $this;
    }

    public function removeUserListByAnnonce(UserListByAnnonce $userListByAnnonce): self
    {
        if ($this->userListByAnnonces->removeElement($userListByAnnonce)) {
            // set the owning side to null (unless already changed)
            if ($userListByAnnonce->getAnnonces() === $this) {
                $userListByAnnonce->setAnnonces(null);
            }
        }

        return $this;
    }
    public function isUserSignedFavorite (User $user):bool
    {
        foreach($this->userListByAnnonces as $userListByAnnonce){
            if($userListByAnnonce->getUsers() === $user) return true;
        }
        return false;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }
}
