<?php

namespace App\Livewire\Pages\Support;

use App\Models\Support;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Supports extends Component
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

    #[On('support_saved')]
    public function reload()
    {
        $this->render();
    }

    #[On('delete_support')]
    public function deleteSupport($id)
    {

        Support::find($id)->delete();

        $this->dispatch('support_deleted');
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
        $data = Support::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        return view('livewire.pages.support.supports', compact('data'));
    }
}
