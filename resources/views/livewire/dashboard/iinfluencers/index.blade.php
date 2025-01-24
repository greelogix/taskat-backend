<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.iinfluencers.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.iinfluencers.collectionTitle') }}..."
        />

        @can('create', App\Models\Iinfluencer::class)
        <a wire:navigate href="{{ route('dashboard.iinfluencers.create') }}">
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
                wire:click="delete({{ $deletingIinfluencer }})"
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
                <x-ui.table.header for-crud wire:click="sortBy('name')"
                    >{{ __('crud.iinfluencers.inputs.name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('bio')"
                    >{{ __('crud.iinfluencers.inputs.bio.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('address')"
                    >{{ __('crud.iinfluencers.inputs.address.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('lat')"
                    >{{ __('crud.iinfluencers.inputs.lat.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('long')"
                    >{{ __('crud.iinfluencers.inputs.long.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('image')"
                    >{{ __('crud.iinfluencers.inputs.image.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($iinfluencers as $iinfluencer)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $iinfluencer->name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $iinfluencer->bio }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $iinfluencer->address }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $iinfluencer->lat }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $iinfluencer->long }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud>
                        <x-ui.table.image
                            url="{{ asset('storage/' . $iinfluencer->image) }}"
                            alt="{{ $iinfluencer->image }}"
                        />
                    </x-ui.table.column>
                    <x-ui.table.action-column>
                        @can('update', $iinfluencer)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.iinfluencers.edit', $iinfluencer) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $iinfluencer)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $iinfluencer->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="7"
                        >No {{ __('crud.iinfluencers.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $iinfluencers->links() }}</div>
    </x-ui.container.table>
</div>
