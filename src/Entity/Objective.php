<?php

namespace App\Entity;

use App\Repository\ObjectiveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectiveRepository::class)
 */
class Objective implements \JsonSerializable
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
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBonus;

    /**
     * @ORM\ManyToOne(targetEntity=Checkpoint::class, inversedBy="Objectives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $checkpoint;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, inversedBy="objectives")
     */
    private $skills;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIsBonus(): ?bool
    {
        return $this->isBonus;
    }

    public function setIsBonus(bool $isBonus): self
    {
        $this->isBonus = $isBonus;

        return $this;
    }

    public function getCheckpoint(): ?Checkpoint
    {
        return $this->checkpoint;
    }

    public function setCheckpoint(?Checkpoint $checkpoint): self
    {
        $this->checkpoint = $checkpoint;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        $this->skills->removeElement($skill);

        return $this;
    }
    public function jsonSerialize()
    {
        $checkpoints = [];
        foreach ($this->checkpoint as $checkpoint) {
            dump($checkpoint);die();
        }
        return array(
            "objective_id"=>$this->id,
            "description"=>$this->description,
            "isBonus"=>$this->isBonus,
            "checkpoints"=>$checkpoints
        );
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
}
