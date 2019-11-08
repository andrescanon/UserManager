<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserFiltersTest extends TestCase
{

    use DatabaseMigrations;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function test_a_user_can_filter_users_by_attributes()
    {
        $anotherUser = factory(User::class)->create();

        $filters = ['name', 'email'];

        foreach ($filters as $filter) {
            $this->get('/admin/users?'.$filter.'='.$this->user->{$filter})
                ->assertSee($this->user->{$filter})
                ->assertDontSee($anotherUser->{$filter});
        }
    }

    public function test_a_user_can_filter_users_by_relations()
    {
        $anotherUser = factory(User::class)->create();

        $filters = ['role'];

        foreach ($filters as $filter) {
            $this->get('/admin/users?'.$filter.'='.$this->user->{$filter}->name)
                ->assertSee($this->user->{$filter}->name)
                ->assertDontSee($anotherUser->{$filter}->name);
        }



    }

}
