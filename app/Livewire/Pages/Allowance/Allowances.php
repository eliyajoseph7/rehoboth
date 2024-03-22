<?php

namespace App\Livewire\Pages\Allowance;

use App\Models\StaffAllowance;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Allowances extends Component
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

    #[On('allowance_saved')]
    public function reload()
    {
        $this->render();
    }

    #[On('delete_allowance')]
    public function deleteAllowance($id)
    {

        StaffAllowance::find($id)->delete();

        $this->dispatch('allowance_deleted');
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
        $data = StaffAllowance::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        return view('livewire.pages.allowance.allowances', compact('data'));
    }
}
