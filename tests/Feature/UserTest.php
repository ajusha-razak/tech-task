<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_user_list_returns_a_successful_response(): void
    {
        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function test_the_user_create_returns_a_successful_response()
    {
        $response = $this->postJson('/users/store', [
            'name' => 'Ajusha',
            'surname' => 'Razak',
            'email' => 'ajusha121@gmail.com',
            'country' => 1,
            'phone' => '88997766',
            'password' => '123123',
            'confirm_password' => '123123',
            'gender' => 1
        ]);
        $response->assertStatus(302);
    }
}
