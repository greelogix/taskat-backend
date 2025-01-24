<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Iinfluencer;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Iinfluencers\Forms\UpdateForm;

class IinfluencerEdit extends Component
{
    public ?Iinfluencer $iinfluencer = null;

    public UpdateForm $form;

    public function mount(Iinfluencer $iinfluencer)
    {
        $this->authorize('view-any', Iinfluencer::class);

        $this->iinfluencer = $iinfluencer;

        $this->form->setIinfluencer($iinfluencer);
    }

    public function save()
    {
        $this->authorize('update', $this->iinfluencer);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.iinfluencers.edit', []);
    }
}
