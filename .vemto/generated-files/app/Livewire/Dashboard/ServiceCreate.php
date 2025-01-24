<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Services\Forms\CreateForm;

class ServiceCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->authorize('create', Service::class);

        $this->validate();

        $service = $this->form->save();

        return redirect()->route('dashboard.services.edit', $service);
    }

    public function render()
    {
        return view('livewire.dashboard.services.create', []);
    }
}
