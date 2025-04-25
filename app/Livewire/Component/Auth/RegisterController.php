<?php

namespace App\Livewire\Component\Auth;

use Livewire\Component;

use App\Models\User;

class RegisterController extends Component
{
    public $email;
    public $password;

    public $confirmPassword;

    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'confirmPassword' => 'required|same:password',
    ];

    protected $messages = [
        'email.required' => 'Email is required.',
        'email.email' => 'Email must be a valid email address.',
        'email.unique' => 'Email already exists.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 6 characters.',
        'confirmPassword.required' => 'Confirm Password is required.',
        'confirmPassword.same' => 'Confirm Password must match Password.',
    ];

    public function register()
    {
        $this->validate();

        User::create([
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('RegisterSuccess', 'Registration successful, please login.');
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
