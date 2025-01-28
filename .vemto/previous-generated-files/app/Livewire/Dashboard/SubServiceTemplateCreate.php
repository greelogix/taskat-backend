<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SubService;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\SubServiceTemplates\Forms\CreateForm;

class SubServiceTemplateCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;
    public Collection $subServices;

    public function mount()
    {
        $this->subServices = SubService::pluck('name', 'id');
    }

    public function save()
    {
        $this->authorize('create', SubServiceTemplate::class);

        $this->validate();

        $subServiceTemplate = $this->form->save();

        return redirect()->route(
            'dashboard.sub-service-templates.edit',
            $subServiceTemplate
        );
    }

    public function render()
    {
        return view('livewire.dashboard.sub-service-templates.create', []);
    }
}
