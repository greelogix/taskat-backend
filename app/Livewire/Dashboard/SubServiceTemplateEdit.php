<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SubService;
use App\Models\SubServiceTemplate;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\SubServiceTemplates\Forms\UpdateForm;

class SubServiceTemplateEdit extends Component
{
    use WithFileUploads;

    public ?SubServiceTemplate $subServiceTemplate = null;

    public UpdateForm $form;
    public Collection $subServices;

    public function mount(SubServiceTemplate $subServiceTemplate)
    {
        $this->authorize('view-any', SubServiceTemplate::class);

        $this->subServiceTemplate = $subServiceTemplate;

        $this->form->setSubServiceTemplate($subServiceTemplate);
        $this->subServices = SubService::pluck('name', 'id');
    }

    public function save()
    {
        $this->authorize('update', $this->subServiceTemplate);

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
        return view('livewire.dashboard.sub-service-templates.edit', []);
    }
}
