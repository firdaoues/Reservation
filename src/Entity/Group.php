<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupRepository::class)
 * @ORM\Table(name="`group`")
 */
class Group
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Pax::class, mappedBy="grp")
     */
    private $paxes;

    /**
     * @ORM\Column(type="integer")
     */
    private $Nombrep;

    public function __construct()
    {
        $this->paxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Pax[]
     */
    public function getPaxes(): Collection
    {
        return $this->paxes;
    }

    public function addPaxis(Pax $paxis): self
    {
        if (!$this->paxes->contains($paxis)) {
            $this->paxes[] = $paxis;
            $paxis->setGrp($this);
        }

        return $this;
    }

    public function removePaxis(Pax $paxis): self
    {
        if ($this->paxes->removeElement($paxis)) {
            // set the owning side to null (unless already changed)
            if ($paxis->getGrp() === $this) {
                $paxis->setGrp(null);
            }
        }

        return $this;
    }

    public function getNombrep(): ?int
    {
        return $this->Nombrep;
    }

    public function setNombrep(int $Nombrep): self
    {
        $this->Nombrep = $Nombrep;

        return $this;
    }
}
