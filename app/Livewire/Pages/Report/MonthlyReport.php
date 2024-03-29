<?php

namespace App\Livewire\Pages\Report;

use App\Exports\MonthlyReportExport;
use App\Http\Controllers\Reports\MonthlyReportController;
use App\Models\CostTaken;
use App\Models\MonthlyReport as ModelsMonthlyReport;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class MonthlyReport extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $data = [];

    public $date;
    public $previousCount = 0;
    public $nextCount = 0;
    // public $total_days;
    public $toNext = False;
    public $totals = [];

    public function previous()
    {
        $this->previousCount += 1;
        $prev = date('Y-m-d', strtotime(now() . ' -' . $this->previousCount . ' month'));
        $this->date = new DateTime($prev);

        $this->fetchReport();
    }

    public function next()
    {
        $this->previousCount -= 1;
        $prev = date('Y-m-d', strtotime(now() . ' -' . $this->previousCount . ' month'));
        $this->date = new DateTime($prev);

        $this->fetchReport();
    }

    public function fetchReport()
    {
        $this->data = ModelsMonthlyReport::whereMonth('date', $this->date->format('m'))->whereYear('date', $this->date->format('Y'))->get();
        $diff = strtotime(now()) - strtotime(now() . ' -' . $this->previousCount . ' month');
        if ($diff == 0) {
            $this->toNext = False;
        } else {
            $this->toNext = True;
        }
        $this->totals = (new MonthlyReportController)->fetchTotals($this->date->format('m'), $this->date->format('Y'));
    }



    public function mount()
    {
        $date = new DateTime("now", new DateTimeZone('Africa/Dar_es_Salaam'));
        $this->date = $date;
        // $this->total_days = cal_days_in_month(CAL_GREGORIAN, $this->date->format('m'), $this->date->format('Y'));
        $this->fetchReport();
    }


    public function export()
    {
        // return Excel::download(new MonthlyReportExport, 'rehoboth_monthly_report.xlsx');
        return (new MonthlyReportExport)->forYear($this->date->format('Y'))->forMonth($this->date->format('m'))->download('rehoboth_monthly_report.xlsx');
    }

    public function render()
    {
        // $data = CostTaken::leftjoin('cost_returns as a', 'a.client_id', '=', 'cost_takens.client_id')
        //     ->where(DB::raw("(DATE_FORMAT(a.date,'%Y-%m-%d'))"), DB::raw("(DATE_FORMAT(cost_takens.date,'%Y-%m-%d'))"))
        //     // ->whereMonth()
        //     ->select(
        //         'cost_takens.date',
        //         DB::raw('SUM(cost_takens.amount) as gawa'),
        //         DB::raw('SUM(form) as form'),
        //         DB::raw('SUM(code) as code'),
        //         // DB::raw('SUM(a.amount) as sale')
        //     )->groupBy('cost_takens.date')->orderBy('cost_takens.date', 'ASC')->get();

        return view('livewire.pages.report.monthly-report');
    }
}
