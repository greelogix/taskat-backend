<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\UserCards\Forms\CreateForm;

class UserCardCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->authorize('create', UserCard::class);

        $this->validate();

        $userCard = $this->form->save();

        return redirect()->route('dashboard.user-cards.edit', $userCard);
    }

    public function render()
    {
        return view('livewire.dashboard.user-cards.create', []);
    }
}
