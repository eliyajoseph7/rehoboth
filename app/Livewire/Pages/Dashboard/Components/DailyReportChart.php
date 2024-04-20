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

    #[On('fetch_report')]
    public function getDailyReportChart($day, $month, $year)
    {
        $report = DailyReport::whereDay('date', $day)->whereMonth('date', $month)->whereYear('date', $year)->first();
        // dump($report);
        $series = [
            'name' => 'Daily Report',
            'data' => [
                doubleval($report->gawa), 
                doubleval($report->form), 
                doubleval($report->mauzo_cash), 
                doubleval($report->mauzo_mpesa),
                doubleval($report->allowance), 
                doubleval($report->mtaji_mpesa), 
                doubleval($report->expenditure_cash), 
                doubleval($report->expenditure_cash),
                doubleval($report->support_in), 
                doubleval($report->support_out),
            ]
        ];

        $this->dispatch('redraw_chart', $series);
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
