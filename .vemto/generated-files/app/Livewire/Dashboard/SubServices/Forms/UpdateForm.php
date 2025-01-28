<?php

namespace App\Livewire\Dashboard\SubServices\Forms;

use Livewire\Form;
use App\Models\SubService;
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
            'image' => ['nullable', 'image', 'max:1024'],
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

        $this->processImage();

        $this->subService->update(
            $this->except(['subService', 'service_id', 'newImage'])
        );
    }

    public function processImage()
    {
        if (empty($this->newImage)) {
            return;
        }

        $this->subService->image = $this->newImage->store(
            'sub_services',
            'public'
        );
    }

    public function deleteImage()
    {
        $this->newImage = null;
    }
}
