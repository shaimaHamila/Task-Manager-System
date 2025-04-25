<?php

namespace App\Livewire\Component\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
class LoginController extends Component
{
    public $email;
    public $password;

 public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
  $user = User::where('email', $this->email)->first();
        if ($user && password_verify($this->password, $user->password)) {
            Auth::login($user);
            session()->flash('message', 'Login successful.');
            return redirect()->route('todos');
        }

        $this->addError('email', 'Invalid credentials.');
    }

    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
