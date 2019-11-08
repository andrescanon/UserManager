<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterControllerTest extends TestCase
{

    use DatabaseMigrations;

    public function test_user_can_view_a_register_form()
    {
        $this->assertGuest();

        $this->get('/register')
            ->assertSuccessful()
            ->assertViewIs('auth.register');
    }

    public function test_user_cannot_view_a_register_form_when_authenticated()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/register')
                ->assertRedirect('/');
    }

    public function test_user_can_register_with_valid_values()
    {

        $response = $this->post('/register', [
            'name' => 'username',
            'email' => 'useremail@example.com',
            'password' => 'secret_password',
            'password_confirmation' => 'secret_password'
        ]);

        $response->assertSessionHasNoErrors()
                ->assertRedirect('/admin/users');

    }

    public function test_user_cannot_register_with_invalid_values()
    {

        $response = $this->post('/register', [
            'name' => 'invalid_name',
            'email' => 'invalid_email',
            'password' => 'secret_password',
            'password_confirmation' => 'invalid_password'
        ]);

        $response->assertSessionHasErrors();

        $this->assertGuest();
    }

}
