<?php

namespace App\Entity;

use App\Repository\CheckpointRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CheckpointRepository::class)
 * @ORM\HasLifecycleCallbacks
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
    private $duration;


    /**
     * @ORM\OneToMany(targetEntity=Objective::class, mappedBy="checkpoint",cascade={"persist","remove"} )
     */
    private $Objectives;

    /**
     * @ORM\ManyToOne(targetEntity=Curriculum::class, inversedBy="checkpoints")
     * @ORM\JoinColumn(nullable=false)
     */
    private $curriculum;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVisible;

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


    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

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
            "duration"=>$this->duration,
            "curriculum" => $this->curriculum,
            "objectives"=>$this->getObjectives(),
        );
    }

    public function getCurriculum(): ?Curriculum
    {
        return $this->curriculum;
    }

    public function setCurriculum(?Curriculum $curriculum): self
    {
        $this->curriculum = $curriculum;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Gets triggered only on insert
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * Gets triggered only on update
     * @ORM\PreUpdate()
     */
    public function onPreUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    public function getGlobalSkills(): Collection
    {
        $globalSkills = new ArrayCollection();
        foreach ($this->Objectives as $objective) {
            foreach ($objective->getSkills() as $skill){
                if(!$globalSkills->contains($skill)) {
                    $globalSkills->add($skill);
                }
            }
        }
        return $globalSkills;


    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }
}
