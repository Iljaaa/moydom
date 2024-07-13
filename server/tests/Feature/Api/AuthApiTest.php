<?php

namespace tests\Feature\Api;

use AllowDynamicProperties;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;


class AuthApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->userPassword = '123';
        $this->user = User::factory()->create(['password' => bcrypt($this->userPassword)]);
    }


    public function test_user_not_found(): void
    {
        $response = $this->postJson(route('api.auth'), [
            'email' => $this->user->email.'asdsd',
            'password' => $this->userPassword,
        ]);

        $response->assertStatus(400);
        $response->assertJsonPath('error', 'invalid_credentials');
    }

    /**
     * @return void
     */
    public function test_incorrect_password(): void
    {
        $response = $this->postJson(route('api.auth'), [
            'email' => $this->user->email,
            'password' => 'asadasd'
        ]);

        $response->assertStatus(400);
        $response->assertJsonPath('error', 'invalid_credentials');
    }

    /**
     * @return void
     */
    public function test_auth_success(): void
    {
        $response = $this->postJson(route('api.auth'), [
            'email' => $this->user->email,
            'password' => $this->userPassword
        ]);

        $response->assertOk();
        $response->assertJson(function (AssertableJson $json) {
            $json->has('token');
        });
    }

//    public function test_the_application_returns_a_unsuccessful_response2(): void
//    {        // $user = User::factory()->create(['password' => bcrypt($password),]);
//
//        $user = User::factory()->create(['password' => bcrypt('123'),]);
//
//        $response = $this->postJson(route('api.auth'), ['email' => $user->email, 'password' => '123']);
//        $data = $response->json();
//        $token = $data['token'];
//
//
//        $response = $this->withToken($token)->getJson('/api');
//        $response->dd();
//    }

}
