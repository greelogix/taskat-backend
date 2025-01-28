<?php

namespace App\Livewire\Dashboard\SubServices\Forms;

use Livewire\Form;
use App\Models\SubService;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required')]
    public $service_id = '';

    #[Rule('required|string')]
    public $name = '';

    #[Rule('nullable|string')]
    public $description = '';

    #[Rule('nullable|image|max:1024')]
    public $image = '';

    public $newImage = null;

    #[Rule('nullable')]
    public $status = '';

    #[Rule('required')]
    public $price = '';

    public function save()
    {
        $this->validate();

        $this->processImage();

        $subService = SubService::create($this->except(['newImage']));

        $this->reset();

        return $subService;
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->image = $this->newImage->store('sub_services', 'public');
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
