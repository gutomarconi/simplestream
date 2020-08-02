<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class ChannelControllerTest
 * @package Tests\Unit
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class ChannelControllerTest extends TestCase
{
    Use DatabaseMigrations;

    /**
     * Tests that the getList method returns a message User Not Authorized when called
     * without token
     *
     * @covers \App\Http\Controllers\ChannelController::get
     *
     * @return void
     */
    public function testGetListUnauthorized(): void
    {
        $response = $this->get('api/channels');
        $response->assertStatus(200);
        $this->assertEquals('User not authorized', $response->getOriginalContent()['status']);
    }

    /**
     * Tests that the getList method receives the correct input and returns the correct output
     * after performing the expected logic.
     *
     * @covers \App\Http\Controllers\ChannelController::get
     *
     * @return void
     */
    public function testGetList(): void
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

        $response = $this->get('api/channels', ['Authorization' => "Bearer " . $token]);
        $response->assertStatus(200);
        $this->assertStringContainsString('data', $response->getContent());
    }
}
