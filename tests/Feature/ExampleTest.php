<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Revolution\Google\Sheets\Facades\Sheets;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_basic_test()
    {
        Sheets::expects('spreadsheet->sheet->get')
            ->andReturn(collect([
                ['John Doe', 'Hello World', '2023-10-01'],
                ['Jane Doe', 'Goodbye World', '2023-10-02'],
            ]));

        Sheets::expects('collection')
            ->andReturn(collect([
                ['name' => 'John Doe', 'message' => 'Hello World', 'created_at' => '2023-10-01'],
                ['name' => 'Jane Doe', 'message' => 'Goodbye World', 'created_at' => '2023-10-02'],
            ]));

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
