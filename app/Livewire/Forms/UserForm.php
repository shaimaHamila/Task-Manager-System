<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public $id;
    #[Validate('required|string|min:3|max:50')]
    public $username = '';
    #[Validate('required|email|max:50')]
    public $email;
    #[Validate('required|string|min:6|max:50')]
    public $password = '';
}
