<?php

namespace Tests\Feature;

use Revolution\Google\Sheets\Facades\Sheets;
use Tests\TestCase;

class ConsoleTest extends TestCase
{
    public function test_sheets_reset_command_clears_and_appends_data()
    {
        // Mock config values
        config([
            'sheets.post_spreadsheet_id' => 'test-spreadsheet-id',
            'sheets.post_sheet_id' => 'test-sheet-id',
        ]);

        // Mock the clear method call
        Sheets::expects('spreadsheet->sheet->clear')
            ->once();

        // Mock the append method call and verify the data structure
        Sheets::expects('append')
            ->once()
            ->withArgs(function ($data) {
                // Verify we get exactly 10 rows
                $this->assertIsArray($data);
                $this->assertCount(10, $data);

                // Verify each row has exactly 3 columns
                foreach ($data as $row) {
                    $this->assertIsArray($row);
                    $this->assertCount(3, $row);

                    // Column 1: should be a string starting with "Reset" followed by number
                    $this->assertIsString($row[0]);
                    $this->assertStringStartsWith('Reset', $row[0]);

                    // Column 2: should be a string (faker sentence)
                    $this->assertIsString($row[1]);

                    // Column 3: should be a datetime string
                    $this->assertIsString($row[2]);
                    // Verify it's a valid datetime format (Y-m-d H:i:s)
                    $this->assertMatchesRegularExpression('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $row[2]);
                }

                return true;
            });

        // Execute the command and verify it returns exit code 0
        $this->artisan('sheets:reset')
            ->assertExitCode(0);
    }
}
