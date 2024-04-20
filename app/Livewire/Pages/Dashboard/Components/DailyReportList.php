<?php

namespace App\Livewire\Pages\Dashboard\Components;

use App\Models\DailyReport;
use DateTime;
use DateTimeZone;
use Livewire\Attributes\On;
use Livewire\Component;

class DailyReportList extends Component
{
    public $report;
    public $total = 0;

    #[On('fetch_report')]
    public function fetchReport($day, $month, $year)
    {
        $this->report = DailyReport::whereDay('date', $day)->whereMonth('date', $month)->whereYear('date', $year)->first();
        $this->updateTotal();
    }

    public function updateTotal()
    {

        $this->total = doubleval($this->report->gawa ?? 0) +
            doubleval($this->report->form ?? 0) +
            doubleval($this->report->mauzo_cash ?? 0) +
            doubleval($this->report->mauzo_mpesa ?? 0) +
            doubleval($this->report->allowance ?? 0) +
            doubleval($this->report->mtaji_mpesa ?? 0) +
            doubleval($this->report->expenditure_cash ?? 0) +
            doubleval($this->report->expenditure_cash ?? 0) +
            doubleval($this->report->support_in ?? 0) +
            doubleval($this->report->support_out ?? 0);
    }

    public function mount()
    {
        $date = new DateTime("now", new DateTimeZone('Africa/Dar_es_Salaam'));
        $this->fetchReport($date->format('d'), $date->format('m'), $date->format('Y'));
    }

    public function render()
    {
        return view('livewire.pages.dashboard.components.daily-report-list');
    }
}
