<?php

namespace App\Service;

class AbstractStudentData
{
    protected string $student;

    /**
     * @return string
     */
    public function getStudent(): string
    {
        return $this->student;
    }

    /**
     * @param string $student
     * @return AbstractStudentData
     */
    public function setStudent(string $student): AbstractStudentData
    {
        $this->student = $student;
        return $this;
    }

}