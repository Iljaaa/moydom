<?php

namespace Tests\Feature;

// use AllowDynamicProperties;
use App\Services\Cadastre\Rosreestr\Contracts\Client;
use App\Services\Cadastre\Rosreestr\Contracts\Parser;
use App\Services\Cadastre\Rosreestr\Impl\RosReesterParser;
use App\Services\Cadastre\Rosreestr\RosReestrService;
use Tests\TestCase;


/**
 * Test for rosreest as source for kadastr service
 */
class RosReesterTest extends TestCase
{
    private array $data;

    protected function setUp(): void
    {
        $this->data = require __DIR__.DIRECTORY_SEPARATOR.'response.php';
        parent::setUp();
    }


    public function test_parser(): void
    {
        $result = (new RosReesterParser)->parse($this->data);

        $this->assertEquals('г Нижний Новгород, б-р 60-летия Октября, д. 23, 134', $result->getAddress());
        $this->assertEquals('17', $result->getFlore());
        $this->assertEquals(65.0, $result->getArea());
        $this->assertEquals(3858786.75, $result->getCadastreValue());
        $this->assertEquals('2015-02-05', $result->getCadastreNumberAssignmentDate()->format('Y-m-d'));
        $this->assertEquals('2020-12-30', $result->getCadastreValueDeterminationDate()->format('Y-m-d'));
    }

    public function test_service()
    {
        $mockClient = $this->createMock(Client::class);
        $mockClient->expects($this->once())->method('get');

        $mockParser = $this->createMock(Parser::class);
        $mockParser->expects($this->once())->method('parse');


        (new RosReestrService($mockClient, $mockParser))->request('code');
    }

}
