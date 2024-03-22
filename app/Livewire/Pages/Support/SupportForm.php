<?php

namespace App\Livewire\Pages\Support;

use App\Models\Support;
use App\Models\SupportCategory;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class SupportForm extends ModalComponent
{
    public $action = 'add';
    public $id;

    #[Rule('required')]
    public $amount;
    
    // #[Rule('required')]
    // public $date;


    #[Rule('required', as: 'Payment method')]
    public $support_category_id;

    protected $listeners = [
        'update_expenditure' => 'editSupport'
    ];

    #[On('set_support_category_id')]
    public function setPaymentMethodId($id)
    {
        $this->support_category_id = $id;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function addSupport()
    {
        $this->validate();

        $qs = new Support;
        // $qs->date = $this->date;
        $qs->amount = $this->amount;
        $qs->support_category_id = $this->support_category_id;
        $qs->user_id = auth()->user()->id;

        $qs->save();

        $this->resetForm();
        $this->dispatch('support_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record saved successfully!');
    }

    public function editSupport($id)
    {
        $this->action = 'update';
        $qs = Support::find($id);
        $this->id = $id;
        $this->amount = $qs->amount;
        $this->support_category_id = $qs->support_category_id;
        $this->dispatch('update_support_category_id_field', $qs->support_category_id);
    }

    public function updateSupport()
    {
        $this->validate();


        $qs = Support::find($this->id);
        $qs->amount = $this->amount;
        // $qs->date = $this->date;
        $qs->support_category_id = $this->support_category_id;


        $qs->save();

        $this->resetForm();
        $this->dispatch('support_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record updated successfully!');
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->editSupport($id);
        }

        $this->dispatch('initialize_scripts');
    }

    public function resetForm()
    {
        $this->dispatch('reset_support_category_id');
        $this->reset();
    }

    public function render()
    {
        $types = SupportCategory::all();
        return view('livewire.pages.support.support-form', compact('types'));
    }
}
