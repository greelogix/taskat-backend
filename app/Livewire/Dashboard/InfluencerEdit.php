<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Influencer;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Livewire\WithPagination;
use App\Livewire\Dashboard\Influencers\Forms\UpdateForm;

class InfluencerEdit extends Component
{
    use WithPagination, WithFileUploads;

    public ?Influencer $influencer = null;

    public UpdateForm $form;

    public function mount(Influencer $influencer)
    {
        $this->authorize('view-any', Influencer::class);

        $this->influencer = $influencer;

        $this->form->setInfluencer($influencer);
    }

    public function save()
    {
        $this->authorize('update', $this->influencer);

        $this->validate();
        
        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.influencers.edit', []);
    }
}
