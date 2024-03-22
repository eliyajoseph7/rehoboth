<?php

namespace App\Livewire\Pages\Expenditure;

use App\Models\Expenditure;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Expenditures extends Component
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

    #[On('expenditure_saved')]
    public function reload()
    {
        $this->render();
    }

    #[On('delete_expenditure')]
    public function deleteExpenditure($id)
    {

        Expenditure::find($id)->delete();

        $this->dispatch('expenditure_deleted');
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
        $data = Expenditure::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        return view('livewire.pages.expenditure.expenditures', compact('data'));
    }
}
