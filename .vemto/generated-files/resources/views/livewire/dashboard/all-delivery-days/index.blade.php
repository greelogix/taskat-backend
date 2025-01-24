<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.allDeliveryDays.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.allDeliveryDays.collectionTitle') }}..."
        />

        @can('create', App\Models\DeliveryDays::class)
        <a
            wire:navigate
            href="{{ route('dashboard.all-delivery-days.create') }}"
        >
            <x-ui.button>New</x-ui.button>
        </a>
        @endcan
    </div>

    {{-- Delete Modal --}}
    <x-ui.modal.confirm wire:model="confirmingDeletion">
        <x-slot name="title"> {{ __('Delete') }} </x-slot>

        <x-slot name="content"> {{ __('Are you sure?') }} </x-slot>

        <x-slot name="footer">
            <x-ui.button
                wire:click="$toggle('confirmingDeletion')"
                wire:loading.attr="disabled"
            >
                {{ __('Cancel') }}
            </x-ui.button>

            <x-ui.button.danger
                class="ml-3"
                wire:click="delete({{ $deletingDeliveryDays }})"
                wire:loading.attr="disabled"
            >
                {{ __('Delete') }}
            </x-ui.button.danger>
        </x-slot>
    </x-ui.modal.confirm>

    {{-- Index Table --}}
    <x-ui.container.table>
        <x-ui.table>
            <x-slot name="head">
                <x-ui.table.header
                    for-crud
                    wire:click="sortBy('sub_service_id')"
                    >{{ __('crud.allDeliveryDays.inputs.sub_service_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('name')"
                    >{{ __('crud.allDeliveryDays.inputs.name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('description')"
                    >{{ __('crud.allDeliveryDays.inputs.description.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('price')"
                    >{{ __('crud.allDeliveryDays.inputs.price.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('status')"
                    >{{ __('crud.allDeliveryDays.inputs.status.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($allDeliveryDays as $deliveryDays)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $deliveryDays->sub_service_id }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $deliveryDays->name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $deliveryDays->description }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $deliveryDays->price }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $deliveryDays->status }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $deliveryDays)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.all-delivery-days.edit', $deliveryDays) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $deliveryDays)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $deliveryDays->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="6"
                        >No {{ __('crud.allDeliveryDays.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $allDeliveryDays->links() }}</div>
    </x-ui.container.table>
</div>
