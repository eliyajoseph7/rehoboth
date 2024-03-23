<?php

namespace App\Exports;

use App\Http\Controllers\Reports\MonthlyReportController;
use App\Models\MonthlyReport;
use DateTime;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyReportExport implements FromView
{
    use Exportable;

    public function forYear(int $year)
    {
        $this->year = $year;
        
        return $this;
    }

    public function forMonth(int $month)
    {
        $this->month = $month;
        
        return $this;
    }

    public function view(): View
    {
        return view('exports.reports.moothly_report', [
            'data' => MonthlyReport::whereMonth('date', $this->month)->whereYear('date', $this->year)->get(),
            'date' => new DateTime(date('Y-m', strtotime($this->year. '-'. $this->month))),
            'totals' => (new MonthlyReportController)->fetchTotals($this->month, $this->year)
        ]);
    }
}
