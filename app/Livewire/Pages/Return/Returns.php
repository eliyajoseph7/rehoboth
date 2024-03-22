<?php

namespace App\Livewire\Pages\Return;

use App\Models\CostReturn;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Returns extends Component
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

    #[On('cost_return_saved')]
    public function reload()
    {
        $this->render();
    }

    #[On('delete_cost_return')]
    public function deleteCostReturn($id)
    {

        CostReturn::find($id)->delete();

        $this->dispatch('cost_return_deleted');
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
        $data = CostReturn::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        return view('livewire.pages.return.returns', compact('data'));
    }
}
