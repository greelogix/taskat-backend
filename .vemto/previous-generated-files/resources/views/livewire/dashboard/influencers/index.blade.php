<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.influencers.collectionTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.influencers.collectionTitle') }}..."
        />

        @can('create', App\Models\Influencer::class)
        <a wire:navigate href="{{ route('dashboard.influencers.create') }}">
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
                wire:click="delete({{ $deletingInfluencer }})"
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
                    >{{ __('crud.influencers.inputs.name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('bio')"
                    >{{ __('crud.influencers.inputs.bio.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('address')"
                    >{{ __('crud.influencers.inputs.address.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('lat')"
                    >{{ __('crud.influencers.inputs.lat.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('long')"
                    >{{ __('crud.influencers.inputs.long.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('image')"
                    >{{ __('crud.influencers.inputs.image.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($influencers as $influencer)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $influencer->name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $influencer->bio }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $influencer->address }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $influencer->lat }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $influencer->long }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud>
                        <x-ui.table.image
                            url="{{ asset('storage/' . $influencer->image) }}"
                            alt="{{ $influencer->image }}"
                        />
                    </x-ui.table.column>
                    <x-ui.table.action-column>
                        @can('update', $influencer)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.influencers.edit', $influencer) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $influencer)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $influencer->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="7"
                        >No {{ __('crud.influencers.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $influencers->links() }}</div>
    </x-ui.container.table>
</div>
