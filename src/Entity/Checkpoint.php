<?php

namespace App\Entity;

use App\Repository\CheckpointRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CheckpointRepository::class)
 */
class Checkpoint implements \JsonSerializable
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cursus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duration;

    /**
     * @ORM\Column(type="array")
     */
    private $globalSkills = [];

    /**
     * @ORM\OneToMany(targetEntity=Objective::class, mappedBy="checkpoint", orphanRemoval=true)
     */
    private $Objectives;

    public function __construct()
    {
        $this->Objectives = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getCursus(): ?string
    {
        return $this->cursus;
    }

    public function setCursus(string $cursus): self
    {
        $this->cursus = $cursus;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getGlobalSkills(): ?array
    {
        return $this->globalSkills;
    }

    public function setGlobalSkills(array $globalSkills): self
    {
        $this->globalSkills = $globalSkills;

        return $this;
    }

    /**
     * @return Collection|Objective[]
     */
    public function getObjectives(): Collection
    {
        return $this->Objectives;
    }

    public function addObjective(Objective $objective): self
    {
        if (!$this->Objectives->contains($objective)) {
            $this->Objectives[] = $objective;
            $objective->setCheckpoint($this);
        }

        return $this;
    }

    public function removeObjective(Objective $objective): self
    {
        if ($this->Objectives->removeElement($objective)) {
            // set the owning side to null (unless already changed)
            if ($objective->getCheckpoint() === $this) {
                $objective->setCheckpoint(null);
            }
        }

        return $this;
    }

    public function jsonSerialize()
    {
        return array(
            "id"=>$this->id,
            "name"=>$this->name,
            "number"=>$this->number,
            "cursus"=>$this->cursus,
            "duration"=>$this->duration,
            "globalSkills"=>$this->globalSkills,
            "objectives"=>$this->getObjectives(),
        );
    }
}
