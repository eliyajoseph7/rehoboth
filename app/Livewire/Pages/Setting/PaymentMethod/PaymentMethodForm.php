<?php

namespace App\Livewire\Pages\Setting\PaymentMethod;

use App\Models\PaymentMethod;
use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class PaymentMethodForm extends ModalComponent
{
    public $action = 'add';
    public $id;

    #[Rule('required')]
    public $name;



    protected $listeners = [
        'update_payment_method' => 'editPaymentMethod'
    ];

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function addPaymentMethod()
    {
        $this->validate();

        $payment_method = new PaymentMethod;
        $payment_method->name = $this->name;
        $payment_method->save();

        $this->resetForm();
        $this->dispatch('payment_method_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record saved successfully!');
    }

    public function editPaymentMethod($id)
    {
        $this->action = 'update';
        $qs = PaymentMethod::find($id);
        $this->id = $id;
        $this->name = $qs->name;
        
    }

    public function updatePaymentMethod()
    {
        $this->validate();

        $payment_method = PaymentMethod::find($this->id);
        $payment_method->name = $this->name;
        
        $payment_method->save();

        $this->resetForm();
        $this->dispatch('payment_method_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record updated successfully!');
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->editPaymentMethod($id);
        }
    }


    public function resetForm()
    {
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.setting.payment-method.payment-method-form');
    }
}
