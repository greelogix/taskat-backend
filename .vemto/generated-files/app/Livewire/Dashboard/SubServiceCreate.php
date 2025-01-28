<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\SubServices\Forms\CreateForm;

class SubServiceCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;
    public Collection $services;

    public function mount()
    {
        $this->services = Service::pluck('title', 'id');
    }

    public function save()
    {
        $this->authorize('create', SubService::class);

        $this->validate();

        $subService = $this->form->save();

        return redirect()->route('dashboard.sub-services.edit', $subService);
    }

    public function render()
    {
        return view('livewire.dashboard.sub-services.create', []);
    }
}
