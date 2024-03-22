<?php

namespace App\Livewire\Pages\Report;

use App\Models\CostTaken;
use App\Models\MonthlyReport as ModelsMonthlyReport;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MonthlyReport extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';



    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function sortColumn($name)
    {
        if ($this->sortBy == $name) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $name;
        $this->sortDir = 'DESC';
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

        $data = ModelsMonthlyReport::get();
        return view('livewire.pages.report.monthly-report', compact('data'));
    }
}
