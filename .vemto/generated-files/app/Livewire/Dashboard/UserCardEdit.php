<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\UserCard;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\UserCards\Forms\UpdateForm;

class UserCardEdit extends Component
{
    public ?UserCard $userCard = null;

    public UpdateForm $form;

    public function mount(UserCard $userCard)
    {
        $this->authorize('view-any', UserCard::class);

        $this->userCard = $userCard;

        $this->form->setUserCard($userCard);
    }

    public function save()
    {
        $this->authorize('update', $this->userCard);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.user-cards.edit', []);
    }
}
