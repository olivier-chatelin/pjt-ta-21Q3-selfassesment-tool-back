<?php

namespace App\Service;



class StudentProgressData extends AbstractStudentData implements \JsonSerializable
{

    private int $totalRegularObjective;

    private int $totalRealizedObjective;

    private int $objectiveRatio;

    /**
     * @return int
     */
    public function getObjectiveRatio(): int
    {
        return $this->objectiveRatio;
    }

    /**
     * @param int $objectiveRatio
     * @return StudentProgressData
     */
    public function setObjectiveRatio(int $objectiveRatio): StudentProgressData
    {
        $this->objectiveRatio = $objectiveRatio;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalRealizedObjective(): int
    {
        return $this->totalRealizedObjective;
    }

    /**
     * @param int $totalRealizedObjective
     * @return StudentProgressData
     */
    public function setTotalRealizedObjective(int $totalRealizedObjective): StudentProgressData
    {
        $this->totalRealizedObjective = $totalRealizedObjective;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalRegularObjective(): int
    {
        return $this->totalRegularObjective;
    }

    /**
     * @param int $totalRegularObjective
     * @return StudentProgressData
     */
    public function setTotalRegularObjective(int $totalRegularObjective): StudentProgressData
    {
        $this->totalRegularObjective = $totalRegularObjective;
        return $this;
    }




    public function jsonSerialize()
    {
        return array(
            "student"=>$this->student,
            "totalRealizedObjective"=>$this->totalRealizedObjective,
            "totalRegularObjective"=>$this->totalRegularObjective,
            "objectiveRatio"=>$this->objectiveRatio,
        );
    }
}