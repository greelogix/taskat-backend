<?php

namespace App\Livewire\Dashboard\AllDeliveryDays\Forms;

use Livewire\Form;
use App\Models\DeliveryDays;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required')]
    public $sub_service_id = '';

    #[Rule('required|string')]
    public $name = '';

    #[Rule('nullable|string')]
    public $description = '';

    #[Rule('nullable')]
    public $price = '';

    #[Rule('required')]
    public $status = '';

    public function save()
    {
        $this->validate();

        $deliveryDays = DeliveryDays::create($this->except([]));

        $this->reset();

        return $deliveryDays;
    }
}
