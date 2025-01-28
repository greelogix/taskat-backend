<?php

namespace App\Livewire\Dashboard\SubServiceTemplates\Forms;

use Livewire\Form;
use Illuminate\Validation\Rule;
use App\Models\SubServiceTemplate;

class UpdateForm extends Form
{
    public ?SubServiceTemplate $subServiceTemplate;

    public $sub_service_id = '';

    public $name = '';

    public $description = '';

    public $image = '';

    public $newImage = null;

    public $url = '';

    public $status = '';

    public function rules(): array
    {
        return [
            'sub_service_id' => ['required'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'url' => ['nullable', 'url'],
            'status' => ['required'],
        ];
    }

    public function setSubServiceTemplate(
        SubServiceTemplate $subServiceTemplate
    ) {
        $this->subServiceTemplate = $subServiceTemplate;

        $this->sub_service_id = $subServiceTemplate->sub_service_id;
        $this->name = $subServiceTemplate->name;
        $this->description = $subServiceTemplate->description;
        $this->image = $subServiceTemplate->image;
        $this->url = $subServiceTemplate->url;
        $this->status = $subServiceTemplate->status;
    }

    public function save()
    {
        $this->validate();

        $this->processImage();

        $this->subServiceTemplate->update(
            $this->except(['subServiceTemplate', 'sub_service_id', 'newImage'])
        );
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->subServiceTemplate->image = $this->newImage->store(
            'sub_service_templates',
            'public'
        );
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
