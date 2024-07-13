<?php

namespace app\Services\Cadastre\Rosreestr\Impl;

use App\Services\Cadastre\Domain\CadastreInformation;
use App\Services\Cadastre\Rosreestr\Contracts\Parser;

class RosReesterParser implements Parser
{
    /**
     *
     */
    public function parse(array $data): CadastreInformation
    {

        $o = new CadastreInformation();


        if (isset($data['egrp']))
        {
            $egrp = $data['egrp'];
            $o->setAddress($egrp['objectData']['objectAddress']['mergedAddress'] ?? '');
            $o->setFlore($egrp['premisesData']['premisesFloor'] ?? null);
        }

        if (isset($data['gkn']))
        {
            $gkn = $data['gkn'];

            $o->setArea($gkn['objectData']['flat']['area'] ?? '');
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

        return $o;
    }

}