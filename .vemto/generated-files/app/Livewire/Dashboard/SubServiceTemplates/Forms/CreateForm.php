<?php

namespace App\Livewire\Dashboard\SubServiceTemplates\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\SubServiceTemplate;

class CreateForm extends Form
{
    #[Rule('required')]
    public $sub_service_id = '';

    #[Rule('required|string')]
    public $name = '';

    #[Rule('nullable|string')]
    public $description = '';

    #[Rule('nullable|image|max:1024')]
    public $image = '';

    public $newImage = null;

    #[Rule('nullable|url')]
    public $url = '';

    #[Rule('required')]
    public $status = '';

    public function save()
    {
        $this->validate();

        $this->processImage();

        $subServiceTemplate = SubServiceTemplate::create(
            $this->except(['newImage'])
        );

        $this->reset();

        return $subServiceTemplate;
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->image = $this->newImage->store(
            'sub_service_templates',
            'public'
        );
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
