<?php

namespace App\Livewire\Dashboard\UserCards\Forms;

use Livewire\Form;
use App\Models\UserCard;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?UserCard $userCard;

    public $holder_name = '';

    public $card_number = '';

    public $valid_date = '';

    public $default = '';

    public function rules(): array
    {
        return [
            'holder_name' => ['required', 'string'],
            'card_number' => ['nullable', 'string'],
            'valid_date' => ['nullable', 'string'],
            'default' => ['required'],
        ];
    }

    public function setUserCard(UserCard $userCard)
    {
        $this->userCard = $userCard;

        $this->holder_name = $userCard->holder_name;
        $this->card_number = $userCard->card_number;
        $this->valid_date = $userCard->valid_date;
        $this->default = $userCard->default;
    }

    public function save()
    {
        $this->validate();

        $this->userCard->update($this->except(['userCard']));
    }
}
