<?php

namespace App\Services\Cadastre\Rosreestr\Contracts;

/**
 * Api data loader
 */
interface Client
{
    /**
     * Load data from api
     * @param string $url
     * @return array
     */
    public function get(string $url): array;
}