<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.subServiceTemplates.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.subServiceTemplates.collectionTitle') }}..."
        />

        @can('create', App\Models\SubServiceTemplate::class)
        <a
            wire:navigate
            href="{{ route('dashboard.sub-service-templates.create') }}"
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
                wire:click="delete({{ $deletingSubServiceTemplate }})"
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
                    >{{
                    __('crud.subServiceTemplates.inputs.sub_service_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('name')"
                    >{{ __('crud.subServiceTemplates.inputs.name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('description')"
                    >{{ __('crud.subServiceTemplates.inputs.description.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('url')"
                    >{{ __('crud.subServiceTemplates.inputs.url.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('status')"
                    >{{ __('crud.subServiceTemplates.inputs.status.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('image')"
                    >{{ __('crud.subServiceTemplates.inputs.image.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($subServiceTemplates as $subServiceTemplate)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $subServiceTemplate->sub_service_id
                        }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $subServiceTemplate->name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $subServiceTemplate->description
                        }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $subServiceTemplate->url }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $subServiceTemplate->status }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud>
                        <x-ui.table.image
                            url="{{ asset('storage/' . $subServiceTemplate->image) }}"
                            alt="{{ $subServiceTemplate->image }}"
                        />
                    </x-ui.table.column>
                    <x-ui.table.action-column>
                        @can('update', $subServiceTemplate)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.sub-service-templates.edit', $subServiceTemplate) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $subServiceTemplate)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $subServiceTemplate->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="7"
                        >No {{ __('crud.subServiceTemplates.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $subServiceTemplates->links() }}</div>
    </x-ui.container.table>
</div>
