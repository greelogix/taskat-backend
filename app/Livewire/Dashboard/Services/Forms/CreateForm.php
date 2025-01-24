<?php

namespace App\Livewire\Dashboard\Services\Forms;

use Livewire\Form;
use App\Models\Service;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required|string|unique:services,title')]
    public $title = '';

    #[Rule('nullable|string')]
    public $description = '';

    #[Rule('nullable|image|max:1024')]
    public $image = '';

    public $newImage = null;

    public function save()
    {
        $this->validate();

        $this->processImage();

        $service = Service::create($this->except(['newImage']));

        $this->reset();

        return $service;
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->image = $this->newImage->store('services', 'public');
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
