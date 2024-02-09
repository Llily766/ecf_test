<?php

namespace App\Entity;

use App\Repository\TestimonialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestimonialRepository::class)]
class Testimonial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\OneToMany(targetEntity: garage::class, mappedBy: 'testimonial')]
    private Collection $lastName;

    public function __construct()
    {
        $this->lastName = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection<int, garage>
     */
    public function getLastName(): Collection
    {
        return $this->lastName;
    }

    public function addLastName(garage $lastName): static
    {
        if (!$this->lastName->contains($lastName)) {
            $this->lastName->add($lastName);
            $lastName->setTestimonial($this);
        }

        return $this;
    }

    public function removeLastName(garage $lastName): static
    {
        if ($this->lastName->removeElement($lastName)) {
            // set the owning side to null (unless already changed)
            if ($lastName->getTestimonial() === $this) {
                $lastName->setTestimonial(null);
            }
        }

        return $this;
    }
}
