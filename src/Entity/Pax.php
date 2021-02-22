<?php

namespace App\Entity;

use App\Repository\PaxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaxRepository::class)
 */
class Pax
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="paxes")
     */
    private $grp;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getGrp(): ?Group
    {
        return $this->grp;
    }

    public function setGrp(?Group $grp): self
    {
        $this->grp = $grp;

        return $this;
    }

}
