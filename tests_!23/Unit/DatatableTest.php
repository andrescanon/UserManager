<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatatableTest extends TestCase
{

    use RefreshDatabase;

    protected $user;

    protected $jsonStructure = ['draw', 'data', 'input'];

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function test_ajax_get_users_response_is_successful()
    {

        $response = $this->json('GET', route('datatable.users.index'));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->jsonStructure);

    }

    public function test_ajax_get_activities_responses_is_successful()
    {
        $data =  [
            'model' => get_class($this->user),
            'key' => $this->user->id
        ];

        $response = $this->json('POST', route('datatable.activities.index'), $data);
        $response->assertStatus(200);
        $response->assertJsonStructure($this->jsonStructure);


    }

    public function test_ajax_get_addresses_response_is_successful()
    {
        $data =  [
            'model' => get_class($this->user),
            'key' => $this->user->id
        ];

        $response = $this->json('POST', route('datatable.addresses.index'), $data);
        $response->dump();
        $response->assertStatus(200);
        $response->assertJsonStructure($this->jsonStructure);


    }


}
