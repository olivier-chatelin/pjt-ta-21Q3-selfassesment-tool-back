<?php

namespace App\Service;

class StudentRadarData extends AbstractStudentData implements \JsonSerializable
{

private array $skillFrequencies;

private array $validateSkillFrequencies;

private array $skillRatios;

private array $skillNames;

    /**
     * @return array
     */
    public function getSkillNames(): array
    {
        return $this->skillNames;
    }

    /**
     * @param array $skillNames
     * @return StudentRadarData
     */
    public function setSkillNames(array $skillNames): StudentRadarData
    {
        $this->skillNames = $skillNames;
        return $this;
    }



    /**
     * @return array
     */
    public function getSkillRatios(): array
    {
        return $this->skillRatios;
    }

    /**
     * @param array $skillRatios
     * @return StudentRadarData
     */
    public function setSkillRatios(array $skillRatios): StudentRadarData
    {
        $this->skillRatios = $skillRatios;
        return $this;
    }

    /**
     * @return array
     */
    public function getValidateSkillFrequencies(): array
    {
        return $this->validateSkillFrequencies;
    }

    /**
     * @param array $validateSkillFrequencies
     * @return StudentRadarData
     */
    public function setValidateSkillFrequencies(array $validateSkillFrequencies): StudentRadarData
    {
        $this->validateSkillFrequencies = $validateSkillFrequencies;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkillFrequencies(): array
    {
        return $this->skillFrequencies;
    }

    /**
     * @param array $skillFrequencies
     * @return StudentRadarData
     */
    public function setSkillFrequencies(array $skillFrequencies): StudentRadarData
    {
        $this->skillFrequencies = $skillFrequencies;
        return $this;
    }


    public function jsonSerialize()
    {
        return array(
            "student"=>$this->student,
            "skillNames"=>$this->skillNames,
            "skillFrequencies"=>$this->skillFrequencies,
            "validateSkillFrequencies"=>$this->validateSkillFrequencies,
            "skillRatios"=>$this->skillRatios,
        );
    }
}