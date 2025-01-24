<?php

namespace App\Livewire\Dashboard\Iinfluencers\Forms;

use Livewire\Form;
use App\Models\Iinfluencer;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Iinfluencer $iinfluencer;

    public $name = '';

    public $bio = '';

    public $address = '';

    public $lat = '';

    public $long = '';

    public $image = '';

    public $newImage = null;

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'lat' => ['nullable', 'string'],
            'long' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function setIinfluencer(Iinfluencer $iinfluencer)
    {
        $this->iinfluencer = $iinfluencer;

        $this->name = $iinfluencer->name;
        $this->bio = $iinfluencer->bio;
        $this->address = $iinfluencer->address;
        $this->lat = $iinfluencer->lat;
        $this->long = $iinfluencer->long;
        $this->image = $iinfluencer->image;
    }

    public function save()
    {
        $this->validate();

        $this->processImage();

        $this->iinfluencer->update($this->except(['iinfluencer', 'newImage']));
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->iinfluencer->image = $this->newImage->store(
            'iinfluencers',
            'public'
        );
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
