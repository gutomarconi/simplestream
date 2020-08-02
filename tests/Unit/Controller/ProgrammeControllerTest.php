<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class ProgrammeControllerTest
 * @package Tests\Unit
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class ProgrammeControllerTest extends TestCase
{
    Use DatabaseMigrations;

    /**
     * Tests that the get method returns a message User Not Authorized when called
     * without token
     *
     * @covers \App\Http\Controllers\ProgrammeController::get
     *
     * @return void
     */
    public function testGetUnauthorized(): void
    {
        $response = $this->get('api/channels/1/programme/1');
        $response->assertStatus(200);
        $this->assertEquals('User not authorized', $response->getOriginalContent()['status']);
    }

    /**
     * Tests that the getList method receives the correct input and returns the correct output
     * after performing the expected logic.
     *
     * @covers \App\Http\Controllers\ProgrammeController::get
     *
     * @return void
     */
    public function testGet(): void
    {
        $this->postJson(
            'api/auth/register',
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => 'test123',
                'password_confirmation' => 'test123',
            ]
        );
        $response = $this->postJson('api/auth/login', ['email' => 'test@test.com', 'password' => 'test123']);
        $content = json_decode($response->getContent());
        $token = $content->access_token;
        $response = $this->get('api/channels/1/programme/1', ['Authorization' => "Bearer " . $token]);
        $response->assertStatus(200);
    }
}
