<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SubService;
use App\Models\DeliveryDays;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\AllDeliveryDays\Forms\UpdateForm;

class DeliveryDaysEdit extends Component
{
    public ?DeliveryDays $deliveryDays = null;

    public UpdateForm $form;
    public Collection $subServices;

    public function mount(DeliveryDays $deliveryDays)
    {
        $this->authorize('view-any', DeliveryDays::class);

        $this->deliveryDays = $deliveryDays;

        $this->form->setDeliveryDays($deliveryDays);
        $this->subServices = SubService::pluck('name', 'id');
    }

    public function save()
    {
        $this->authorize('update', $this->deliveryDays);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.all-delivery-days.edit', []);
    }
}
