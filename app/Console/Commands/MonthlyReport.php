<?php

namespace App\Console\Commands;

use App\Http\Controllers\Reports\MonthlyReportController;
use Illuminate\Console\Command;

class MonthlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate monthly report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new MonthlyReportController)->generate();
        $this->info('Report generated successfully!');
    }
}
