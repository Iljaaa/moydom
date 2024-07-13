<?php

namespace App\Services\Cadastre;

/**
 * Service for load data by Cadastre code
 */
interface CadastreService
{
    public function request(string $cadastreNumber): SearchResult;
}