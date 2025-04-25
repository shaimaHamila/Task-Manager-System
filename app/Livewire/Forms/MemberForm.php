<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MemberForm extends Form
{
    public $id;
    #[Validate('required|string|min:3|max:50')]
    public $firstName = '';
    #[Validate('required|string|min:3|max:50')]
    public $lastName = '';
    #[Validate('required|email|max:50')]
    public $email = '';
    #[Validate('required|string|min:3|max:50')]
    public $phone = '';

}
