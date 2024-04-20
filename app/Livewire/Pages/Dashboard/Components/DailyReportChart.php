<?php

namespace App\Livewire\Pages\Dashboard\Components;

use App\Models\DailyReport;
use DateTime;
use DateTimeZone;
use Livewire\Attributes\On;
use Livewire\Component;

class DailyReportChart extends Component
{
    public $categories = ['Gawa', 'Form', 'Mauzo Cash', 'Mauzo Mpesa', 'Posho', 'Mtaji Mpesa', 'Matumizi Cash', 'Matumizi Mpesa', 'Support In', 'Support Out'];

    public $date;
    public $fetching_chart = false;

    #[On('fetch_report')]
    public function getDailyReportChart($day, $month, $year)
    {
        $this->fetching_chart = true;
        $report = DailyReport::whereDay('date', $day)->whereMonth('date', $month)->whereYear('date', $year)->first();
        // dump($report);
        $series = [
            'name' => 'Daily Report',
            'data' => [
                doubleval($report->gawa ?? 0), 
                doubleval($report->form ?? 0), 
                doubleval($report->mauzo_cash ?? 0), 
                doubleval($report->mauzo_mpesa ?? 0),
                doubleval($report->allowance ?? 0), 
                doubleval($report->mtaji_mpesa ?? 0), 
                doubleval($report->expenditure_cash ?? 0), 
                doubleval($report->expenditure_cash ?? 0),
                doubleval($report->support_in ?? 0), 
                doubleval($report->support_out ?? 0),
            ]
        ];

        $this->dispatch('redraw_chart', $series);
        $this->fetching_chart = false;
    }


    public function mount()
    {
        $date = new DateTime("now", new DateTimeZone('Africa/Dar_es_Salaam'));
        $this->getDailyReportChart($date->format('d'), $date->format('m'), $date->format('Y'));
    }


    public function render()
    {
        return view('livewire.pages.dashboard.components.daily-report-chart');
    }
}
