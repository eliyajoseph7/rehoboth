<?php

namespace App\Livewire\Pages\Expenditure;

use App\Models\Expenditure;
use App\Models\PaymentMethod;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ExpenditureForm extends ModalComponent
{
    public $action = 'add';
    public $id;

    #[Rule('required')]
    public $amount;
    
    #[Rule('required')]
    public $date;


    #[Rule('required', as: 'Payment method')]
    public $payment_method_id;

    protected $listeners = [
        'update_expenditure' => 'editExpenditure'
    ];

    #[On('set_payment_method_id')]
    public function setPaymentMethodId($id)
    {
        $this->payment_method_id = $id;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function addExpenditure()
    {
        $this->validate();

        $qs = new Expenditure;
        $qs->date = $this->date;
        $qs->amount = $this->amount;
        $qs->payment_method_id = $this->payment_method_id;
        $qs->user_id = auth()->user()->id;

        $qs->save();

        $this->resetForm();
        $this->dispatch('client_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record saved successfully!');
    }

    public function editExpenditure($id)
    {
        $this->action = 'update';
        $qs = Expenditure::find($id);
        $this->id = $id;
        $this->date = $qs->date;
        $this->amount = $qs->amount;
        $this->payment_method_id = $qs->payment_method_id;
        $this->dispatch('update_payment_method_id_field', $qs->payment_method_id);
    }

    public function updateExpenditure()
    {
        $this->validate();


        $qs = Expenditure::find($this->id);
        $qs->amount = $this->amount;
        $qs->date = $this->date;
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
            $this->editExpenditure($id);
        }

        $this->dispatch('initialize_scripts');
    }

    public function resetForm()
    {
        $this->dispatch('reset_payment_method_id');
        $this->reset();
    }

    public function render()
    {
        $methods = PaymentMethod::all();
        return view('livewire.pages.expenditure.expenditure-form', compact('methods'));
    }
}
