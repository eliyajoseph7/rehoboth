<?php

namespace App\Livewire\Pages\CostTaken;

use App\Models\Client;
use App\Models\CostTaken;
use App\Models\PaymentMethod;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class TakenForm extends ModalComponent
{
    public $action = 'add';
    public $id;

    #[Rule('required')]
    public $amount;
    #[Rule('required')]
    public $form;
    #[Rule('required')]
    public $code;
    #[Rule('required')]
    public $date;

    #[Rule('required', as: 'Client')]
    public $client_id;

    #[Rule('required', as: 'Payment method')]
    public $payment_method_id;

    protected $listeners = [
        'update_client' => 'editCostTaken'
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
        return '4xl';
    }

    public function addCostTaken()
    {
        $this->validate();

        $qs = new CostTaken;
        $qs->date = $this->date;
        $qs->amount = $this->amount;
        $qs->code = $this->code;
        $qs->form = $this->form;
        $qs->client_id = $this->client_id;
        $qs->payment_method_id = $this->payment_method_id;
        $qs->user_id = auth()->user()->id;

        $qs->save();

        $this->resetForm();
        $this->dispatch('client_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record saved successfully!');
    }

    public function editCostTaken($id)
    {
        $this->action = 'update';
        $qs = CostTaken::find($id);
        $this->id = $id;
        $this->amount = $qs->amount;
        $this->date = $qs->date;
        $this->code = $qs->code;
        $this->form = $qs->form;
        $this->client_id = $qs->client_id;
        $this->payment_method_id = $qs->payment_method_id;
        $this->dispatch('update_client_id_field', $qs->client_id);
        $this->dispatch('update_payment_method_id_field', $qs->payment_method_id);
    }

    public function updateCostTaken()
    {
        $this->validate();


        $qs = CostTaken::find($this->id);
        $qs->amount = $this->amount;
        $qs->code = $this->code;
        $qs->form = $this->form;
        $qs->date = $this->date;
        $qs->client_id = $this->client_id;
        $qs->payment_method_id = $this->payment_method_id;


        $qs->save();

        $this->resetForm();
        $this->dispatch('cost_taken_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record updated successfully!');
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->editCostTaken($id);
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
        return view('livewire.pages.cost-taken.taken-form', compact('methods', 'clients'));
    }
}
