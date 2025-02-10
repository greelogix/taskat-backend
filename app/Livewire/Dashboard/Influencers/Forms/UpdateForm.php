<?php

namespace App\Livewire\Dashboard\Influencers\Forms;

use Livewire\Form;
use App\Models\Influencer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Influencer $influencer;

    public $name = '';

    public $bio = '';

    public $lat = '';

    public $long = '';

    public $address = '';

    public $image = '';

    public $newImage = null;

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'lat' => ['nullable', 'string'],
            'long' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'newImage' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function setInfluencer(Influencer $influencer)
    {
        $this->influencer = $influencer;

        $this->name = $influencer->name;
        $this->bio = $influencer->bio;
        $this->lat = $influencer->lat;
        $this->long = $influencer->long;
        $this->address = $influencer->address;
        $this->image = $influencer->image;
    }

    public function save()
    {
        $this->validate();
    
        if ($this->newImage) {
            $this->processImage();
        }
    
        $this->influencer->update([
            'name' => $this->name,
            'bio' => $this->bio,
            'lat' => $this->lat,
            'long' => $this->long,
            'address' => $this->address,
            'image' => $this->image,
        ]);
    
        $this->reset('newImage');
    }

    public function processImage()
    {
        if ($this->newImage) {
            $this->image = $this->newImage->store('influencers', 'public');
            $this->influencer->update(['image' => $this->image]);
        }
    }

    // public function save()
    // {
    //     $this->validate();

    //     $this->processImage();

    //     $this->influencer->update($this->except(['influencer', 'newImage']));
    // }

    // public function processImage()
    // {
    //     if (empty($this->newImage)) {
    //         return;
    //     }

    //     $this->influencer->image = $this->newImage->store(
    //         'influencers',
    //         'public'
    //     );
    // }

    // public function deleteImage()
    // {
    //     $this->newImage = null;
    // }
    public function deleteImage()
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image); 
        }
        $this->newImage = null;
        $this->image = null;
        $this->influencer->update(['image' => null]);
    }
}
