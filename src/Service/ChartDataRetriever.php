<?php

namespace App\Service;

use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\ManagerRegistry;

class ChartDataRetriever
{
    private ManagerRegistry $managerRegistry;
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function getProgressionData(Collection $results): array
    {
        $progressionData = [];
        foreach ($results as $result) {
        $totalRegularObjective = 0;
        $totalRealizedObjective = 0;
            foreach ($result->getCheckPoint()->getObjectives() as $objective){
                if(!$objective->getIsBonus()) {
                    $totalRegularObjective ++;
                }
            }
            foreach($result->getSerialized() as $objective){
                if($objective["isChecked"]){
                    $totalRealizedObjective ++;
                };
            };

            $studentData = new StudentProgressData();
            $studentData->setStudent($result->getStudent())
                        ->setTotalRegularObjective($totalRegularObjective)
                        ->setTotalRealizedObjective($totalRealizedObjective)
                        ->setObjectiveRatio($totalRegularObjective !== 0?floor(100 * $totalRealizedObjective/$totalRegularObjective):0);

            $progressionData[] = $studentData;
        }
        $totalCrewRegularObjective = 0;
        $totalCrewRealizedObjective = 0;
        foreach ($progressionData as $studentData) {
            $totalCrewRegularObjective += $studentData->getTotalRegularObjective();
            $totalCrewRealizedObjective += $studentData->getTotalRealizedObjective();
        }

        $averageData = new StudentProgressData();
        $averageData->setStudent('Moyenne du Crew')
                    ->setTotalRegularObjective($totalCrewRegularObjective)
                    ->setTotalRealizedObjective($totalCrewRealizedObjective)
                    ->setObjectiveRatio($totalCrewRegularObjective !== 0?floor(100 * $totalCrewRealizedObjective/$totalCrewRegularObjective):0);
        array_unshift($progressionData,$averageData);
        return $progressionData;
    }
    public function getRadarData(Collection $results): array
    {
        $radarData = [];
        $validatedSkills = [];
        foreach ($results as $result) {
            $skillNames = [];
            foreach ($result->getCheckPoint()->getObjectives() as $objective) {
                foreach ($objective->getSkills() as $skill) {
                    $skillNames[] = $skill->getName();
                }
            }
            foreach (array_unique($skillNames) as $skill) {
                $validatedSkills[$skill] = 0;
            }
            foreach ($result->getSerialized() as $objective) {
                if($objective['isChecked']) {
                    foreach ($objective['skills'] as $skill)
                            $validatedSkills[$skill['name']]++;
                    };
                }
            $skillFrequencies = array_count_values($skillNames);
            $skillRatios = [];
            foreach ($skillFrequencies as $skillName => $frequency) {
                if($frequency !==0 ){
                    $skillRatios[$skillName] = floor(100 * $validatedSkills[$skillName] / $frequency);
                } else{
                    $skillRatios[$skillName] = 0;
                }
            }
            $studentRadarData = new StudentRadarData();
            $studentRadarData   ->setStudent($result->getStudent())
                                ->setSkillNames(array_unique($skillNames))
                                ->setSkillFrequencies($skillFrequencies)
                                ->setValidateSkillFrequencies($validatedSkills)
                                ->setSkillRatios($skillRatios);
        $radarData[] = $studentRadarData;
        }
        $skillNames = [];
        $skillFrequencies = [];
        $validatedSkills = [];
        $skillRatios = [];
        foreach ($radarData as $studentRadarData) {
            foreach ($studentRadarData->getSkillNames() as $name) {
                $skillNames[] = $name;
            }
        }
        foreach ($skillNames as $name){
        $skillFrequencies[$name] = 0;
        $validatedSkills[$name] = 0;
        $skillRatios[$name] = 0;
    }
        foreach ($radarData as $studentRadarData) {
            foreach ($studentRadarData->getSkillFrequencies() as $name => $frequency) {
                $skillFrequencies[$name] += $frequency;
            }
            foreach ($studentRadarData->getValidateSkillFrequencies() as $name => $frequency) {
                $validatedSkills[$name] += $frequency;
            }
            foreach ($studentRadarData->getSkillRatios() as $name => $frequency) {
                if(count($results )!== 0) {

                $skillRatios[$name] += floor($frequency/count($results));
                } else{
                    $skillRatios[$name] = 0;
                }
            }
        }




        $averageData = new StudentRadarData();
        $averageData->setStudent('la moyenne du Crew')
            ->setSkillNames(array_unique($skillNames))
            ->setSkillFrequencies($skillFrequencies)
            ->setValidateSkillFrequencies($validatedSkills)
            ->setSkillRatios($skillRatios);
        array_unshift($radarData,$averageData);

        return $radarData;
    }
}