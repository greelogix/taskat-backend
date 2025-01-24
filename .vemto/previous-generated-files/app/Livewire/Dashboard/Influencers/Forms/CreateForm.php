<?php

namespace App\Livewire\Dashboard\Influencers\Forms;

use Livewire\Form;
use App\Models\Influencer;
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

    #[Rule('required|image|max:1024')]
    public $image = '';

    public $newImage = null;

    public function save()
    {
        $this->validate();

        $this->processImage();

        $influencer = Influencer::create($this->except(['newImage']));

        $this->reset();

        return $influencer;
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->image = $this->newImage->store('influencers', 'public');
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
