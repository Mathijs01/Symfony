<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GedragsregelsRepository")
 */
class Gedragsregels
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $regels;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegels(): ?string
    {
        return $this->regels;
    }

    public function setRegels(string $regels): self
    {
        $this->regels = $regels;

        return $this;
    }
}
