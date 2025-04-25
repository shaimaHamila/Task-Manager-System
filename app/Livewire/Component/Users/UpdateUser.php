<?php

namespace App\Livewire\Component\Users;

use Livewire\Component;
use App\Models\User;
use App\Livewire\Forms\UserForm;

class UpdateUser extends Component
{
    public UserForm $selectedUser;

    // Use mount to initialize the selectedUser value it is like a constructor
    // and it is called when the component is created
    // I can not use it in my case i am passing the UserForm as a parameter to the component and it will be injected automatically
    // If the parent data changed the nested components will not change (it is not like react)
    // you can use it to set the initial
     public function mount(UserForm $selectedUser){
        $this->selectedUser = $selectedUser;
    }

    public function updateUser()
    {
        $this->validate();

        $user = User::find($this->selectedUser->id);

        if ($user) {
            $user->update([
                'username' => $this->selectedUser->username,
                'email' => $this->selectedUser->email,
            ]);
            if ($this->selectedUser->password) {
                $user->update([
                    'password' => bcrypt($this->selectedUser->password),
                ]);
            }
            $this->reset(['selectedUser']);
            $this->closeModal();
        }
    }


    public function closeModal()
    {
        $this->dispatch('closeUpdateUserModal');
    }

    public function render()
    {
        return view('livewire.component.users.update-user');
    }
}
