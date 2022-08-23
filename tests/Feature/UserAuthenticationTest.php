<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class UserAuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_screen_can_render()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_user_can_authenticated_in_login()
    {
        $user = User::factory()->create();
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'password'
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
    public function test_user_cannot_authenticated_withinvalid()
    {
        $user = User::factory()->create();
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'wrong-password'
        ]);
        $this->assertGuest();
    }
}
