<?php

namespace App\Services\Cadastre\Rosreestr\Impl;

use App\Services\Cadastre\Domain\CadastreInformation;
use App\Services\Cadastre\Rosreestr\Contracts\Parser;
use App\Services\Cadastre\SearchResult;

class RosReesterParser implements Parser
{
    /**
     *
     */
    public function parse(array $data): SearchResult
    {
        if (!empty($data['errorCode'])) {
            return SearchResult::CreateFailResult($data['errorCode']);
        }

        $o = new CadastreInformation();

        if (isset($data['egrp']))
        {
            $egrp = $data['egrp'];
            $o->setAddress($egrp['objectData']['objectAddress']['mergedAddress'] ?? '');
            if (isset($egrp['premisesData'])){
                $o->setArea($egrp['premisesData']['areaValue'] ?? null);
                $o->setFlore($egrp['premisesData']['premisesFloor'] ?? null);
            }
        }

        if (isset($data['gkn']))
        {
            $gkn = $data['gkn'];

            $o->setCadastreValue($gkn['objectData']['flat']['cadCostValue'] ?? 0);
            try {
                if (!empty($gkn['objectData']['flat']['dateCreated'])) {
                    $o->setCadastreValueDeterminationDate(new \DateTime($gkn['objectData']['flat']['ccDateEntering']));
                }
            }
            catch (\Throwable) {
                // mb we should write log here
            }

            $o->setCadastreNumber($gkn['objectCn'] ?? '');
            try {
                if (!empty($gkn['objectData']['dateCreated'])) {
                    $o->setCadastreNumberAssignmentDate(new \DateTime($gkn['objectData']['dateCreated']));
                }
            }
            catch (\Throwable) {
                // mb we should write log here
            }
        }

        return SearchResult::createSuccessResult()
            ->setInformation($o);
    }

}