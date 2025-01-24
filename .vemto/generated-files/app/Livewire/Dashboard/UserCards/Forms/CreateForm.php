<?php

namespace App\Livewire\Dashboard\UserCards\Forms;

use Livewire\Form;
use App\Models\UserCard;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required|string')]
    public $holder_name = '';

    #[Rule('nullable|string')]
    public $card_number = '';

    #[Rule('nullable|string')]
    public $valid_date = '';

    #[Rule('required')]
    public $default = '';

    public function save()
    {
        $this->validate();

        $userCard = UserCard::create($this->except([]));

        $this->reset();

        return $userCard;
    }
}
