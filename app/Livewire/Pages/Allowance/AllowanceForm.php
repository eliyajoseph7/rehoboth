<?php

namespace App\Livewire\Pages\Allowance;

use App\Models\Staff;
use App\Models\StaffAllowance;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AllowanceForm extends ModalComponent
{
    public $action = 'add';
    public $id;

    #[Rule('required')]
    public $amount;
    
    #[Rule('required')]
    public $date;


    #[Rule('required', as: 'Staff')]
    public $staff_id;

    protected $listeners = [
        'update_expenditure' => 'editAllowance'
    ];

    #[On('set_staff_id')]
    public function setStaffId($id)
    {
        $this->staff_id = $id;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function addAllowance()
    {
        $this->validate();

        $qs = new StaffAllowance;
        $qs->date = $this->date;
        $qs->amount = $this->amount;
        $qs->staff_id = $this->staff_id;
        $qs->user_id = auth()->user()->id;

        $qs->save();

        $this->resetForm();
        $this->dispatch('client_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record saved successfully!');
    }

    public function editAllowance($id)
    {
        $this->action = 'update';
        $qs = StaffAllowance::find($id);
        $this->id = $id;
        $this->date = $qs->date;
        $this->amount = $qs->amount;
        $this->staff_id = $qs->staff_id;
        $this->dispatch('update_staff_id_field', $qs->staff_id);
    }

    public function updateAllowance()
    {
        $this->validate();


        $qs = StaffAllowance::find($this->id);
        $qs->amount = $this->amount;
        $qs->date = $this->date;
        $qs->staff_id = $this->staff_id;


        $qs->save();

        $this->resetForm();
        $this->dispatch('cost_return_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'Record updated successfully!');
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->editAllowance($id);
        }

        $this->dispatch('initialize_scripts');
    }

    public function resetForm()
    {
        $this->dispatch('reset_staff_id');
        $this->reset();
    }

    public function render()
    {
        $staffs = Staff::all();
        return view('livewire.pages.allowance.allowance-form', compact('staffs'));
    }
}
