<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\ContentCategories\Forms\CreateForm;

class ContentCategoryCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->authorize('create', ContentCategory::class);

        $this->validate();

        $contentCategory = $this->form->save();

        return redirect()->route(
            'dashboard.content-categories.edit',
            $contentCategory
        );
    }

    public function render()
    {
        return view('livewire.dashboard.content-categories.create', []);
    }
}
