<?php

namespace App\Services\Cadastre\Rosreestr\Contracts;

use App\Services\Cadastre\Domain\CadastreInformation;
use App\Services\Cadastre\SearchResult;

/**
 * Api data parser
 */
interface Parser
{

    /**
     * Parser api data
     * @param array $data
     * @return SearchResult
     */
    public function parse(array $data): SearchResult;

}