<?php

namespace App\Services\Cadastre\Rosreestr;


use App\Services\Cadastre\CadastreService;
use App\Services\Cadastre\Domain\CadastreInformation;
use App\Services\Cadastre\Rosreestr\Contracts\Client;
use App\Services\Cadastre\Rosreestr\Contracts\Parser;

class RosReestrService implements CadastreService
{

    public function __construct(private Client $client, private Parser $parser)
    {
    }

    /**
     * @param string $cadastreNumber
     * @return CadastreInformation
     */
    public function request(string $cadastreNumber): CadastreInformation
    {
        $url =  config('rosreester.url')
                . "/" . $cadastreNumber
                . '?' . http_build_query(['token' => config('rosreester.token')]);

        return $this->parser->parse($this->client->get($url));
    }

}