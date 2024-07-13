<?php

namespace App\Services\Cadastre\Rosreestr\Contracts;

use App\Services\Cadastre\Domain\CadastreInformation;

/**
 * Api data parser
 */
interface Parser
{

    /**
     * Parser api data
     * @param array $data
     * @return CadastreInformation
     */
    public function parse(array $data): CadastreInformation;

}