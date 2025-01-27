<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Influencers\Forms\CreateForm;

class InfluencerCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->authorize('create', Influencer::class);

        $this->validate();

        $influencer = $this->form->save();

        return redirect()->route('dashboard.influencers.edit', $influencer);
    }

    public function render()
    {
        return view('livewire.dashboard.influencers.create', []);
    }
}
