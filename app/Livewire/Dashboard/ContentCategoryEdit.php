<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\ContentCategory;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\ContentCategories\Forms\UpdateForm;

class ContentCategoryEdit extends Component
{
    public ?ContentCategory $contentCategory = null;

    public UpdateForm $form;

    public function mount(ContentCategory $contentCategory)
    {
        $this->authorize('view-any', ContentCategory::class);

        $this->contentCategory = $contentCategory;

        $this->form->setContentCategory($contentCategory);
    }

    public function save()
    {
        $this->authorize('update', $this->contentCategory);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.content-categories.edit', []);
    }
}
