<?php

namespace App\Livewire\Pages\Return;

use App\Models\Client;
use App\Models\CostReturn;
use App\Models\PaymentMethod;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ReturnForm extends ModalComponent
{
    public $action = 'add';
    public $id;

    #[Rule('required')]
    public $amount;
    
    #[Rule('required')]
    public $date;

    #[Rule('required', as: 'Client')]
    public $client_id;

    #[Rule('required', as: 'Payment method')]
    public $payment_method_id;

    protected $listeners = [
        'update_client' => 'editCostReturn'
    ];

    #[On('set_client_id')]
    public function setClientId($id)
    {
        $this->client_id = $id;
    }

    #[On('set_payment_method_id')]
    public function setPaymentMethodId($id)
    {
        $this->payment_method_id = $id;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function addCostReturn()
    {
        $this->validate();

        $qs = new CostReturn;
        $qs->date = $this->date;
        $qs->amount = $this->amount;
        $qs->client_id = $this->client_id;
        $qs->payment_method_id = $this->payment_method_id;
        $qs->user_id = auth()->user()->id;

        $qs->save();

        $this->resetForm();
        $this->dispatch('client_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record saved successfully!');
    }

    public function editCostReturn($id)
    {
        $this->action = 'update';
        $qs = CostReturn::find($id);
        $this->id = $id;
        $this->date = $qs->date;
        $this->amount = $qs->amount;
        $this->client_id = $qs->client_id;
        $this->payment_method_id = $qs->payment_method_id;
        $this->dispatch('update_client_id_field', $qs->client_id);
        $this->dispatch('update_payment_method_id_field', $qs->payment_method_id);
    }

    public function updateCostReturn()
    {
        $this->validate();


        $qs = CostReturn::find($this->id);
        $qs->amount = $this->amount;
        $qs->date = $this->date;
        $qs->client_id = $this->client_id;
        $qs->payment_method_id = $this->payment_method_id;


        $qs->save();

        $this->resetForm();
        $this->dispatch('cost_return_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record updated successfully!');
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->editCostReturn($id);
        }

        $this->dispatch('initialize_scripts');
    }

    public function resetForm()
    {
        $this->dispatch('reset_client_id');
        $this->dispatch('reset_payment_method_id');
        $this->reset();
    }

    public function render()
    {
        $methods = PaymentMethod::all();
        $clients = Client::all();
        return view('livewire.pages.return.return-form', compact('methods', 'clients'));
    }
}
