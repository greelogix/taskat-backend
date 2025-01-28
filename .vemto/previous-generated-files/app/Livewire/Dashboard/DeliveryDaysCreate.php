<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SubService;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\AllDeliveryDays\Forms\CreateForm;

class DeliveryDaysCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;
    public Collection $subServices;

    public function mount()
    {
        $this->subServices = SubService::pluck('name', 'id');
    }

    public function save()
    {
        $this->authorize('create', DeliveryDays::class);

        $this->validate();

        $deliveryDays = $this->form->save();

        return redirect()->route(
            'dashboard.all-delivery-days.edit',
            $deliveryDays
        );
    }

    public function render()
    {
        return view('livewire.dashboard.all-delivery-days.create', []);
    }
}
