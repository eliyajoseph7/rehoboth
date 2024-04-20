<?php

namespace App\Console\Commands;

use App\Http\Controllers\Reports\DailyReportController;
use Illuminate\Console\Command;

class DailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate daily report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new DailyReportController)->generate();
        $this->info('Report generated successfully!');
    }
}
