<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Revolution\Google\Sheets\Facades\Sheets;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Sheets::shouldReceive('spreadsheet->sheet->get')->once()->andReturn(collect([
            ['id', 'name'],
            ['1', 'test'],
        ]));

        $posts = collect([
            [
                'id'   => '1',
                'name' => 'test',
            ],
        ]);

        Sheets::shouldReceive('collection')->once()->andReturn($posts);

        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertViewHas('posts', $posts);
    }
}
