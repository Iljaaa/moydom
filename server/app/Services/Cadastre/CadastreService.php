<?php

namespace App\Services\Cadastre;

use App\Services\Cadastre\Domain\CadastreInformation;

/**
 * Service for load data by Cadastre code
 */
interface CadastreService
{
    public function request(string $cadastreNumber): CadastreInformation;
}