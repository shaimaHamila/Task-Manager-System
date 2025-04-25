<?php

namespace App\Livewire\Component\Users;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
class Users extends Component
{
    use WithPagination;
    public UserForm $newUserForm;
    public UserForm $selectedUser;
    public $showModal = false;

    //Create new user
    public function createNewUser()
    {
        $this->newUserForm->validate();

        User::create([
            'username' => $this->newUserForm->username,
            'email' => $this->newUserForm->email,
            'password' => bcrypt($this->newUserForm->password),
        ]);

        $this->reset(['newUserForm']);
    }

    //Get user by id
    public function getUserById($userId)
    {
        $user = User::findOrFail($userId);
        if ($user) {
            return $user;
        } else {
            return null;
        }
    }

    //Close update user modal

    protected $listeners = ['closeUpdateUserModal' => 'handleCloseModal'];

    public function handleCloseModal()
    {
        $this->showModal = false;
    }
    //Open update user modal
    public function openUpdateUserModal($userId)
    {
        $user = $this->getUserById($userId);
        if ($user) {
            $this->selectedUser->id = $user->id;
            $this->selectedUser->username = $user->username;
            $this->selectedUser->email = $user->email;
            $this->selectedUser->password = '';
            $this->showModal = true;
        } else {
            session()->flash('alert', 'User not found.');
        }
        //Else show an alert
    }
    //Fetch all users with pagination Computed Properties

    // Efficiency: They automatically update when their dependencies change, reducing the need for manual updates.
    // Readability: They simplify code by encapsulating complex logic inside a property.
    // Reactivity: They allow reactive updates, ensuring the UI reflects changes instantly.
    // Clean Code: Avoids repetitive logic in templates or methods, keeping code concise and maintainable.
    #[Computed(persist: true)]
    public function fetchAllUsersWithPagination()
    {
        return ['users' => User::latest()->paginate(5), 'count' => User::count()];
    }

    //Delete user
    public function deleteUser($userId)
    {
        $user = $this->getUserById($userId);
        if ($user) {
            $user->delete();
            session()->flash('deleteUserSession', 'User deleted successfully.');
        } else {
            session()->flash('deleteUserSession', 'User not found.');
        }
    }
    public function render()
    {
        return view('livewire.pages.users.users', [
            'users' => $this->fetchAllUsersWithPagination()['users'],
            'count' => $this->fetchAllUsersWithPagination()['count'],
        ]);
    }
}
