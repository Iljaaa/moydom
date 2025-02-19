<?php

namespace tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class SearchApiTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $userPassword = '123';
        $user = User::factory()->create(['password' => bcrypt($userPassword)]);

        $response = $this->postJson(route('api.auth'), [
            'email' => $user->email,
            'password' => $userPassword
        ]);

        $this->token = $response->json('token');

    }

    /**
     *
     */
    public function test_request_with_empty_code(): void
    {
        $response = $this->withToken($this->token)
            ->postJson(route('api.search'), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'code' => [
                'The code field is required.'
            ],
        ]);
    }

    /**
     *
     */
    public function test_request_with_wrong_format_code(): void
    {
        $response = $this->withToken($this->token)
            ->postJson(route('api.search'), ['code' => '52:__:70256:1560']);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'code' => [
                'he code field format is invalid.'
            ]
        ]);
    }

    /**
     *
     */
    public function test_search_in_reester(): void
    {
        $response = $this->withToken($this->token)
            ->postJson(route('api.search'), ['code' => '24:02:4301001:38']);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);

        $response->assertJson(function (AssertableJson $json) {
            $json->has('success');

            $json->has('data', function (AssertableJson $dataJson) {
                $dataJson
                    ->has('address')
                    ->has('flore')
                    ->has('area')
                    ->has('cadastre_value')
                    ->has('cadastre_value_date')
                    ->has('cadastre_number')
                    ->has('cadastre_number_date');
            });
        });
    }

}
