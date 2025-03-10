<?php

namespace App\Entity;

use App\Repository\CustomerEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerEntityRepository::class)]
class CustomerEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"entity_id", type:"integer")]
    private $id;

    #[ORM\Column(length: 255)]
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
