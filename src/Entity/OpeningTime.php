<?php

namespace App\Entity;

use App\Repository\OpeningTimeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningTimeRepository::class)]
class OpeningTime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $days = null;

    #[ORM\Column(length: 255)]
    private ?string $morning = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?garage $evening = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(string $days): static
    {
        $this->days = $days;

        return $this;
    }

    public function getMorning(): ?string
    {
        return $this->morning;
    }

    public function setMorning(string $morning): static
    {
        $this->morning = $morning;

        return $this;
    }

    public function getEvening(): ?garage
    {
        return $this->evening;
    }

    public function setEvening(?garage $evening): static
    {
        $this->evening = $evening;

        return $this;
    }
}
