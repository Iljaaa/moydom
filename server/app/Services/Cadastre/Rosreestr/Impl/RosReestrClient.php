<?php

namespace App\Services\Cadastre\Rosreestr\Impl;

use App\Services\Cadastre\Rosreestr\Contracts\Client;

class RosReestrClient implements Client
{
    /**
     * @param string $url
     * @return array
     * @throws \HttpException
     */
    public function get(string $url): array
    {
        $data = file_get_contents($url);

        if (!$data) throw new \HttpException('Data not loaded from reester');

        return json_decode($data, true);

    }

}