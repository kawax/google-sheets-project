<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Mockery as m;

use App\User;

use Revolution\Google\Sheets\Facades\Sheets;

class SheetsTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testIndex()
    {
        Sheets::shouldReceive('setAccessToken')->once()->andReturn(m::self());
        Sheets::shouldReceive('spreadsheetList')->once()->andReturn([]);

        $user = factory(User::class)->make();

        $response = $this->actingAs($user)
                         ->get('/home');

        $response->assertStatus(200)
                 ->assertViewHas('spreadsheets');
    }
}
