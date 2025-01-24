<?php

namespace App\Livewire\Dashboard\Services\Forms;

use Livewire\Form;
use App\Models\Service;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Service $service;

    public $title = '';

    public $description = '';

    public $image = '';

    public $newImage = null;

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                Rule::unique('services', 'title')->ignore($this->service),
            ],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function setService(Service $service)
    {
        $this->service = $service;

        $this->title = $service->title;
        $this->description = $service->description;
        $this->image = $service->image;
    }

    public function save()
    {
        $this->validate();

        $this->processImage();

        $this->service->update($this->except(['service', 'newImage']));
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->service->image = $this->newImage->store('services', 'public');
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
