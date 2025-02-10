<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Service;
use App\Models\SubService;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\SubServices\Forms\UpdateForm;
use Illuminate\Support\Facades\Storage;

class SubServiceEdit extends Component
{
    use WithFileUploads;

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

    public function deleteImage()
    {
        $this->form->deleteImage();
        $this->dispatch('imageDeleted');
    }
    
    public function render()
    {
        return view('livewire.dashboard.sub-services.edit', []);
    }
}
