<?php

namespace App\Livewire\Dashboard\Iinfluencers\Forms;

use Livewire\Form;
use App\Models\Iinfluencer;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('nullable|string')]
    public $name = '';

    #[Rule('nullable|string')]
    public $bio = '';

    #[Rule('nullable|string')]
    public $address = '';

    #[Rule('nullable|string')]
    public $lat = '';

    #[Rule('nullable|string')]
    public $long = '';

    #[Rule('nullable|image|max:1024')]
    public $image = '';

    public $newImage = null;

    public function save()
    {
        $this->validate();

        $this->processImage();

        $iinfluencer = Iinfluencer::create($this->except(['newImage']));

        $this->reset();

        return $iinfluencer;
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->image = $this->newImage->store('iinfluencers', 'public');
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
