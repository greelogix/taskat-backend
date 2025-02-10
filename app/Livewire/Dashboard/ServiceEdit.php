<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Collection;
use Livewire\WithFileUploads;
use App\Livewire\Dashboard\Services\Forms\UpdateForm;
use Illuminate\Support\Facades\Storage;

class ServiceEdit extends Component
{
   
    use WithFileUploads;

    public ?Service $service = null;

    public UpdateForm $form;

    public function mount(Service $service)
    {
        $this->authorize('view-any', Service::class);

        $this->service = $service;

        $this->form->setService($service);
    }

    public function save()
    {
        $this->authorize('update', $this->service);
        $this->validate();
        $this->form->save();

        $this->dispatch('saved');
    }

    public function deleteImage()
    {
        if ($this->service->image) {
            Storage::delete($this->service->image);
            $this->service->image = null;
            $this->service->save();
        }
    }

    public function render()
    {
        return view('livewire.dashboard.services.edit', []);
    }
}
