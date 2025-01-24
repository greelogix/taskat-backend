<?php

namespace App\Livewire\Dashboard\ContentCategories\Forms;

use Livewire\Form;
use Illuminate\Validation\Rule;
use App\Models\ContentCategory;

class UpdateForm extends Form
{
    public ?ContentCategory $contentCategory;

    public $name = '';

    public $decription = '';

    public $status = '';

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'decription' => ['required', 'string'],
            'status' => ['required'],
        ];
    }

    public function setContentCategory(ContentCategory $contentCategory)
    {
        $this->contentCategory = $contentCategory;

        $this->name = $contentCategory->name;
        $this->decription = $contentCategory->decription;
        $this->status = $contentCategory->status;
    }

    public function save()
    {
        $this->validate();

        $this->contentCategory->update($this->except(['contentCategory']));
    }
}
