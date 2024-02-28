<?php

namespace App\Livewire\Pages\Setting\User;

use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;

class UserForm extends ModalComponent
{
    public $action = 'add';
    public $id;

    #[Rule('required')]
    public $name;

    public $image;

    #[Rule('required')]
    public $phone;

    // #[Rule('required')]
    public $password;

    protected $listeners = [
        'update_user' => 'editUser'
    ];

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    public function addUser()
    {
        $this->validate();

        $user = new Staff;
        $user->name = $this->name;
        // $user->image = $this->image;
        $user->phone = $this->phone;
        $user->save();

        $this->resetForm();
        $this->dispatch('user_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'User saved successfully!');
    }

    public function editUser($id)
    {
        $this->action = 'update';
        $qs = Staff::find($id);
        $this->id = $id;
        $this->name = $qs->name;
        // $this->image = $qs->image;
        $this->phone = $qs->phone;
        
    }

    public function updateUser()
    {
        $this->validate();

        $user = Staff::find($this->id);
        $user->name = $this->name;
        // $user->image = $this->image;
        $user->phone = $this->phone;

        $user->save();

        $this->resetForm();
        $this->dispatch('user_saved');
        $this->closeModal();
        $this->dispatch('show_success', 'User updated successfully!');
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->editUser($id);
        }
    }


    public function resetForm()
    {
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.setting.user.user-form');
    }
}
