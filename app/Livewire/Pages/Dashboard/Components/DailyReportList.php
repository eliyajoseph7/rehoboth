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

        $this->total = doubleval($this->report->gawa) +
            doubleval($this->report->form) +
            doubleval($this->report->mauzo_cash) +
            doubleval($this->report->mauzo_mpesa) +
            doubleval($this->report->allowance) +
            doubleval($this->report->mtaji_mpesa) +
            doubleval($this->report->expenditure_cash) +
            doubleval($this->report->expenditure_cash) +
            doubleval($this->report->support_in) +
            doubleval($this->report->support_out);
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
