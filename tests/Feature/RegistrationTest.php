<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_check_registration_screen_render()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
    public function test_check_new_user_can_register()
    {
        $response = $this->post('/register',[
            'name' => 'admin',
            'is_admin' => '1',
            'email' => 'admin@gmail.com',
            'password' =>   'password',
            'password_confirmation' =>   'password',
            'terms' => 'on',        
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect('/home');
    }
    use RefreshDatabase;    
}
