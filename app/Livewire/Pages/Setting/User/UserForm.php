<?php

namespace App\Livewire\Pages\Setting\User;

use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class UserForm extends ModalComponent
{
    use WithFileUploads;
    public $action = 'add';
    public $id;

    #[Rule('required')]
    public $name;

    public $image;

    #[Rule('required')]
    public $phone;


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
        $fileNameToSave = null;
        if($this->image != null) {
            $this->file = (object)$this->image;

            $file = $this->file->getClientOriginalName();
            $extension = $this->file->getClientOriginalExtension();
            $fileName = pathinfo($file, PATHINFO_FILENAME)."-".date('Ymd-His').".".$extension;
            $this->file->storeAs('staffs', $fileName, 'public');
            
            $fileNameToSave = '/storage/staffs/'.$fileName;
        }

        $user->image == $fileNameToSave;
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
        $this->image = $qs->image;
        $this->phone = $qs->phone;
        
    }

    public function updateUser()
    {
        $this->validate();

        $user = Staff::find($this->id);
        $user->name = $this->name;
        $user->phone = $this->phone;

        $fileNameToSave = null;
        if($this->image != null) {
            $this->file = (object)$this->image;
            try {
                $file = $this->file->getClientOriginalName();
                $extension = $this->file->getClientOriginalExtension();
                $fileName = pathinfo($file, PATHINFO_FILENAME)."-".date('Ymd-His').".".$extension;

                // find the previous stored image and replace in in storage
                $image = Staff::find($this->id)->image;
                if($image) {
                    $imgname = str_replace(substr($image, 0, 9), '', $image);
                    $check = Storage::disk('public')->exists($imgname);
                    if($check) {
                        Storage::disk('public')->delete($imgname);
                    }
                }
                $this->file->storeAs('staffs', $fileName, 'public');
                
                $fileNameToSave = '/storage/staffs/'.$fileName;
            } catch (\Throwable $e) {
            }
        }
        $user->image = $fileNameToSave;
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
