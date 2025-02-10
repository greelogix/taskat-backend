<?php

namespace App\Livewire\Dashboard\SubServices\Forms;

use Livewire\Form;
use App\Models\SubService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?SubService $subService;

    public $service_id = '';

    public $name = '';

    public $description = '';

    public $image = '';

    public $newImage = null;

    public $status = '';

    public $price = '';

    public function rules(): array
    {
        return [
            'service_id' => ['required'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'newImage' => ['nullable', 'image', 'max:1024'],
            'status' => ['nullable'],
            'price' => ['required'],
        ];
    }

    public function setSubService(SubService $subService)
    {
        $this->subService = $subService;

        $this->service_id = $subService->service_id;
        $this->name = $subService->name;
        $this->description = $subService->description;
        $this->image = $subService->image;
        $this->status = $subService->status;
        $this->price = $subService->price;
    }

    public function save()
    {
        $this->validate();
    
        if ($this->newImage) {
            $this->processImage();
        }
    
        $this->subService->update([
            'service_id' => $this->service_id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'price' => $this->price,
            'image' => $this->image,
        ]);
    
        $this->reset('newImage');
    }
    

    public function processImage()
    {
        if ($this->newImage) {
            $this->image = $this->newImage->store('services', 'public');
            $this->subService->update(['image' => $this->image]);
        }
    }

    public function deleteImage()
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image); 
        }
        $this->newImage = null;
        $this->image = null;
        $this->subService->update(['image' => null]);
    }
}
