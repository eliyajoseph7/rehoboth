<?php

namespace App\Livewire\Pages\Dashboard;

use DateTime;
use DateTimeZone;
use Livewire\Component;

class Dashboard extends Component
{
    public $date;
    public $previousCount = 0;
    public $nextCount = 0;
    public $toNext = False;
    public $total = [];

    public function previous()
    {
        $this->previousCount += 1;
        $prev = date('Y-m-d', strtotime(now() . ' -' . $this->previousCount . ' day'));
        $this->date = new DateTime($prev);

        $diff = strtotime(now()) - strtotime(now() . ' -' . $this->previousCount . ' day');
        if ($diff == 0) {
            $this->toNext = False;
        } else {
            $this->toNext = True;
        }
        $this->dispatch('fetch_report', $this->date->format('d'), $this->date->format('m'), $this->date->format('Y'));
    }

    public function next()
    {
        $this->previousCount -= 1;
        $prev = date('Y-m-d', strtotime(now() . ' -' . $this->previousCount . ' day'));
        $this->date = new DateTime($prev);

        $diff = strtotime(now()) - strtotime(now() . ' -' . $this->previousCount . ' day');
        if ($diff == 0) {
            $this->toNext = False;
        } else {
            $this->toNext = True;
        }
        
        $this->dispatch('fetch_report', $this->date->format('d'), $this->date->format('m'), $this->date->format('Y'));
    }

    public function mount()
    {
        $date = new DateTime("now", new DateTimeZone('Africa/Dar_es_Salaam'));
        $this->date = $date;
        $this->dispatch('fetch_report', $this->date->format('d'), $this->date->format('m'), $this->date->format('Y'));
    }

    public function render()
    {

        return view('livewire.pages.dashboard.dashboard');
    }
}
