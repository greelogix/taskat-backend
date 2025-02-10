<?php

namespace App\Livewire\Dashboard\SubServiceTemplates\Forms;

use Livewire\Form;
use Illuminate\Validation\Rule;
use App\Models\SubServiceTemplate;
use Illuminate\Support\Facades\Storage;

class UpdateForm extends Form
{
    public ?SubServiceTemplate $subServiceTemplate;

    public $sub_service_id = '';

    public $name = '';

    public $description = '';

    public $image = '';

    public $newImage = null;

    public $url = '';

    public $status = '';

    public function rules(): array
    {
        return [
            'sub_service_id' => ['required'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'newImage' => ['nullable', 'image', 'max:1024'],
            'url' => ['nullable', 'url'],
            'status' => ['required'],
        ];
    }

    public function setSubServiceTemplate(
        SubServiceTemplate $subServiceTemplate
    ) {
        $this->subServiceTemplate = $subServiceTemplate;

        $this->sub_service_id = $subServiceTemplate->sub_service_id;
        $this->name = $subServiceTemplate->name;
        $this->description = $subServiceTemplate->description;
        $this->image = $subServiceTemplate->image;
        $this->url = $subServiceTemplate->url;
        $this->status = $subServiceTemplate->status;
    }

    public function save()
    {
        $this->validate();
    
        if ($this->newImage) {
            $this->processImage();
        }
    
        $this->subServiceTemplate->update([
            'sub_service_id' => $this->sub_service_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'url' =>$this->url,
            'status' => $this->status,
        ]);
    
        $this->reset('newImage');
    }

    public function processImage()
    {
        if ($this->newImage) {
            $this->image = $this->newImage->store('sub_service_templates', 'public');
            $this->subServiceTemplate->update(['image' => $this->image]);
        }
    }
    
    public function deleteImage()
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image); 
        }
        $this->newImage = null;
        $this->image = null;
        $this->subServiceTemplate->update(['image' => null]);
    }
}
