<?php

namespace App\Livewire\Pages\CostTaken;

use App\Models\CostTaken;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Taken extends Component
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

    #[On('cost_taken_saved')]
    public function reload()
    {
        $this->render();
    }

    #[On('delete_cost_taken')]
    public function deleteCostTaken($id)
    {

        CostTaken::find($id)->delete();

        $this->dispatch('cost_taken_deleted');
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
        $data = CostTaken::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        return view('livewire.pages.cost-taken.taken', compact('data'));
    }
}
