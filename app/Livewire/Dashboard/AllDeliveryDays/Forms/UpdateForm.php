<?php

namespace App\Livewire\Dashboard\AllDeliveryDays\Forms;

use Livewire\Form;
use App\Models\DeliveryDays;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?DeliveryDays $deliveryDays;

    public $sub_service_id = '';

    public $name = '';

    public $description = '';

    public $price = '';

    public $status = '';

    public function rules(): array
    {
        return [
            'sub_service_id' => ['required'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['nullable'],
            'status' => ['required'],
        ];
    }

    public function setDeliveryDays(DeliveryDays $deliveryDays)
    {
        $this->deliveryDays = $deliveryDays;

        $this->sub_service_id = $deliveryDays->sub_service_id;
        $this->name = $deliveryDays->name;
        $this->description = $deliveryDays->description;
        $this->price = $deliveryDays->price;
        $this->status = $deliveryDays->status;
    }

    public function save()
    {
        $this->validate();

        // $this->deliveryDays->update(
        //     $this->except(['deliveryDays', 'sub_service_id'])
        // );

        $this->deliveryDays->update([
            'sub_service_id' => $this->sub_service_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'status' => $this->status,
        ]);
    }
}
