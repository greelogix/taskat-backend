<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.subServices.collectionTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.subServices.collectionTitle') }}..."
        />

        @can('create', App\Models\SubService::class)
        <a wire:navigate href="{{ route('dashboard.sub-services.create') }}">
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
                wire:click="delete({{ $deletingSubService }})"
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
                <x-ui.table.header for-crud wire:click="sortBy('service_id')"
                    >{{ __('crud.subServices.inputs.service_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('name')"
                    >{{ __('crud.subServices.inputs.name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('description')"
                    >{{ __('crud.subServices.inputs.description.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('status')"
                    >{{ __('crud.subServices.inputs.status.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('price')"
                    >{{ __('crud.subServices.inputs.price.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('image')"
                    >{{ __('crud.subServices.inputs.image.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($subServices as $subService)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $subService->service_id }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $subService->name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $subService->description }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $subService->status }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $subService->price }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud>
                        <x-ui.table.image
                            url="{{ asset('storage/' . $subService->image) }}"
                            alt="{{ $subService->image }}"
                        />
                    </x-ui.table.column>
                    <x-ui.table.action-column>
                        @can('update', $subService)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.sub-services.edit', $subService) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $subService)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $subService->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="7"
                        >No {{ __('crud.subServices.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $subServices->links() }}</div>
    </x-ui.container.table>
</div>
