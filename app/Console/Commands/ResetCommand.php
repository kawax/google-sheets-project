<?php

namespace App\Console\Commands;

use Faker\Factory;
use Illuminate\Console\Command;
use Revolution\Google\Sheets\Facades\Sheets;

class ResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sheets:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))
              ->sheet(config('sheets.post_sheet_id'))
              ->clear();

        $faker = Factory::create();

        $append = collect()->times(
            10,
            fn ($number) => [
                'Reset'.$number.' '.$faker->name,
                $faker->sentence,
                now()->toDateTimeString(),
            ]
        );

        Sheets::append($append->all());
    }
}
