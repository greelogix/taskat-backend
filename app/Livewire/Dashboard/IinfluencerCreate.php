<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Iinfluencers\Forms\CreateForm;

class IinfluencerCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->authorize('create', Iinfluencer::class);

        $this->validate();

        $iinfluencer = $this->form->save();

        return redirect()->route('dashboard.iinfluencers.edit', $iinfluencer);
    }

    public function render()
    {
        return view('livewire.dashboard.iinfluencers.create', []);
    }
}
