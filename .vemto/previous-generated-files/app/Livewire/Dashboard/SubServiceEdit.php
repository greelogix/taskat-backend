<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\SubServices\Forms\UpdateForm;

class SubServiceEdit extends Component
{
    public ?SubService $subService = null;

    public UpdateForm $form;
    public Collection $services;

    public function mount(SubService $subService)
    {
        $this->authorize('view-any', SubService::class);

        $this->subService = $subService;

        $this->form->setSubService($subService);
        $this->services = Service::pluck('title', 'id');
    }

    public function save()
    {
        $this->authorize('update', $this->subService);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.sub-services.edit', []);
    }
}
