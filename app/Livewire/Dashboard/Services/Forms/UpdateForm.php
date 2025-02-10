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
            'title' => ['required', 'string', Rule::unique('services', 'title')->ignore($this->service)],
            'description' => ['nullable', 'string'],
            'newImage' => ['nullable', 'image', 'max:1024'], // Correct rule for new image
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
    
        $this->service->update([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
        ]);
    
        $this->reset('newImage');
    }
    
    public function processImage()
    {
        if ($this->newImage) {
            $this->image = $this->newImage->store('services', 'public');
            $this->service->update(['image' => $this->image]);
        }
    }
    
    public function deleteImage()
    {
        $this->newImage = null;
        $this->image = null;
        $this->service->update(['image' => null]);
    }
    
}
