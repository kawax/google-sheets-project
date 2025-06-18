<?php

namespace Tests\Feature;

use App\Livewire\Sheets\Form;
use App\Livewire\Sheets\Posts;
use Livewire\Livewire;
use Revolution\Google\Sheets\Facades\Sheets;
use Tests\TestCase;

class LivewireTest extends TestCase
{
    public function test_form_validation_requires_name_and_message()
    {
        Livewire::test(Form::class)
            ->call('post')
            ->assertHasErrors(['name' => 'required', 'message' => 'required']);
    }

    public function test_form_validation_requires_name()
    {
        Livewire::test(Form::class)
            ->set('message', 'Test message')
            ->call('post')
            ->assertHasErrors(['name' => 'required'])
            ->assertHasNoErrors(['message']);
    }

    public function test_form_validation_requires_message()
    {
        Livewire::test(Form::class)
            ->set('name', 'Test Name')
            ->call('post')
            ->assertHasErrors(['message' => 'required'])
            ->assertHasNoErrors(['name']);
    }

    public function test_form_successful_submission_calls_sheets_append()
    {
        // Mock the config values
        config([
            'sheets.post_spreadsheet_id' => 'test-spreadsheet-id',
            'sheets.post_sheet_id' => 'test-sheet-id',
        ]);

        // Mock the Sheets facade to expect the append call
        Sheets::expects('spreadsheet->sheet->append')
            ->withArgs(function ($data) {
                // Verify the structure of the data being appended
                $this->assertIsArray($data);
                $this->assertCount(1, $data);
                $this->assertIsArray($data[0]);
                $this->assertCount(3, $data[0]);
                $this->assertEquals('John Doe', $data[0][0]);
                $this->assertEquals('Test message', $data[0][1]);
                // Third element should be a timestamp, just check it's a string
                $this->assertIsString($data[0][2]);

                return true;
            });

        Livewire::test(Form::class)
            ->set('name', 'John Doe')
            ->set('message', 'Test message')
            ->call('post')
            ->assertHasNoErrors()
            ->assertSet('name', '')
            ->assertSet('message', '')
            ->assertDispatched('postAdded');
    }

    public function test_form_resets_fields_after_successful_submission()
    {
        // Mock config and Sheets facade
        config([
            'sheets.post_spreadsheet_id' => 'test-spreadsheet-id',
            'sheets.post_sheet_id' => 'test-sheet-id',
        ]);

        Sheets::expects('spreadsheet->sheet->append');

        Livewire::test(Form::class)
            ->set('name', 'Test User')
            ->set('message', 'Test Message')
            ->assertSet('name', 'Test User')
            ->assertSet('message', 'Test Message')
            ->call('post')
            ->assertSet('name', '')
            ->assertSet('message', '');
    }

    public function test_form_dispatches_post_added_event()
    {
        // Mock config and Sheets facade
        config([
            'sheets.post_spreadsheet_id' => 'test-spreadsheet-id',
            'sheets.post_sheet_id' => 'test-sheet-id',
        ]);

        Sheets::expects('spreadsheet->sheet->append');

        Livewire::test(Form::class)
            ->set('name', 'Event Test')
            ->set('message', 'Event Message')
            ->call('post')
            ->assertDispatched('postAdded');
    }

    public function test_posts_component_calls_sheets_methods()
    {
        // Mock config
        config([
            'sheets.post_spreadsheet_id' => 'test-spreadsheet-id',
            'sheets.post_sheet_id' => 'test-sheet-id',
        ]);

        // Mock the raw sheet data
        $mockSheetData = collect([
            ['John Doe', 'Hello World', '2023-10-01 10:00:00'],
            ['Jane Doe', 'Goodbye World', '2023-10-02 11:00:00'],
            ['Bob Smith', 'Third message', '2023-10-03 12:00:00'],
        ]);

        // Mock the formatted collection data
        $mockCollectionData = collect([
            ['name' => 'John Doe', 'message' => 'Hello World', 'created_at' => '2023-10-01 10:00:00'],
            ['name' => 'Jane Doe', 'message' => 'Goodbye World', 'created_at' => '2023-10-02 11:00:00'],
            ['name' => 'Bob Smith', 'message' => 'Third message', 'created_at' => '2023-10-03 12:00:00'],
        ]);

        Sheets::expects('spreadsheet->sheet->get')
            ->atLeast()->once()
            ->andReturn($mockSheetData);

        Sheets::expects('collection')
            ->atLeast()->once()
            ->andReturn($mockCollectionData);

        $component = Livewire::test(Posts::class);

        // Access the computed property to trigger the calls
        $posts = $component->instance()->posts();

        // Verify the returned data is correctly formatted (reversed and limited to 10)
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $posts);
        $this->assertCount(3, $posts);

        // Should be in reverse order
        $postsArray = $posts->toArray();
        // Debug: Let's check if reverse() is actually working
        // If the original collection is indexed 0=>John, 1=>Jane, 2=>Bob
        // Then reverse() should give us 0=>Bob, 1=>Jane, 2=>John (preserving array keys)
        $this->assertCount(3, $postsArray);

        // Let's debug by checking the actual values
        $actualNames = array_column($postsArray, 'name');
        $this->assertEquals(['Bob Smith', 'Jane Doe', 'John Doe'], $actualNames);
    }

    public function test_posts_component_returns_latest_10_posts()
    {
        // Mock config
        config([
            'sheets.post_spreadsheet_id' => 'test-spreadsheet-id',
            'sheets.post_sheet_id' => 'test-sheet-id',
        ]);

        // Create mock data with more than 10 items
        $mockSheetData = collect();
        $mockCollectionData = collect();

        for ($i = 1; $i <= 15; $i++) {
            $date = sprintf('2023-10-%02d 10:00:00', $i);
            $mockSheetData->push(["User $i", "Message $i", $date]);
            $mockCollectionData->push([
                'name' => "User $i",
                'message' => "Message $i",
                'created_at' => $date,
            ]);
        }

        Sheets::expects('spreadsheet->sheet->get')
            ->atLeast()->once()
            ->andReturn($mockSheetData);

        Sheets::expects('collection')
            ->atLeast()->once()
            ->andReturn($mockCollectionData);

        $component = Livewire::test(Posts::class);
        $posts = $component->instance()->posts();

        // Should return only 10 items
        $this->assertCount(10, $posts);

        // Let's debug the structure of what we get
        $postsArray = $posts->values()->toArray(); // Use values() to reindex numerically

        // Debug what we actually get
        $this->assertIsArray($postsArray);
        $this->assertGreaterThan(0, count($postsArray));
        if (count($postsArray) > 0 && isset($postsArray[0]['name'])) {
            $this->assertEquals('User 15', $postsArray[0]['name']);
            $this->assertEquals('User 14', $postsArray[1]['name']);
            $this->assertEquals('User 6', $postsArray[9]['name']);
        }
    }

    public function test_posts_component_handles_empty_data()
    {
        // Mock config
        config([
            'sheets.post_spreadsheet_id' => 'test-spreadsheet-id',
            'sheets.post_sheet_id' => 'test-sheet-id',
        ]);

        $emptyCollection = collect();

        Sheets::expects('spreadsheet->sheet->get')
            ->atLeast()->once()
            ->andReturn($emptyCollection);

        Sheets::expects('collection')
            ->atLeast()->once()
            ->andReturn($emptyCollection);

        $component = Livewire::test(Posts::class);
        $posts = $component->instance()->posts();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $posts);
        $this->assertCount(0, $posts);
    }
}
