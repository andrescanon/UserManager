<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_can_view_pages_when_authenticated()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->get('/admin/users')
            ->assertSuccessful()
            ->assertViewIs('template::users.index');

        $this->get('/admin/users/'.$user->id)
            ->assertSuccessful()
            ->assertViewIs('template::users.show');

//        $this->get('/admin/users/'.$user->id.'/edit')
//            ->assertSuccessful()
//            ->assertViewIs('template::users.edit');
    }

    public function test_user_cannot_view_pages_when_guest()
    {
        $user = factory(User::class)->create();
        $redirectUrl = '/login';

        $this->assertGuest();

        $this->get('/admin/users')->assertRedirect($redirectUrl);
        $this->get('/admin/users/'.$user->id)->assertRedirect($redirectUrl);
        $this->get('/admin/users/'.$user->id.'/edit')->assertRedirect($redirectUrl);
    }


}
