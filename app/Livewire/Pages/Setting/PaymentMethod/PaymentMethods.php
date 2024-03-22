<?php

namespace App\Livewire\Pages\Setting\PaymentMethod;

use App\Models\PaymentMethod;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentMethods extends Component
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

    #[On('payment_method_saved')]
    public function reload()
    {
        $this->render();
    }

    #[On('delete_payment_method')]
    public function deletePaymentMethod($id)
    {

        PaymentMethod::find($id)->delete();

        $this->dispatch('payment_method_deleted');
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
        $data = PaymentMethod::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        return view('livewire.pages.setting.payment-method.payment-methods', compact('data'));
    }
}
