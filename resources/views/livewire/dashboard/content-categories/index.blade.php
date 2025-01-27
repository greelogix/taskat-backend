<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.contentCategories.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.contentCategories.collectionTitle') }}..."
        />

        @can('create', App\Models\ContentCategory::class)
        <a
            wire:navigate
            href="{{ route('dashboard.content-categories.create') }}"
        >
            <x-ui.button style="background: #033F9D !important;">Add</x-ui.button>
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
                wire:click="delete({{ $deletingContentCategory }})"
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
                    >{{ __('crud.contentCategories.inputs.name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('decription')"
                    >{{ __('crud.contentCategories.inputs.decription.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('status')"
                    >{{ __('crud.contentCategories.inputs.status.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($contentCategories as $contentCategory)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $contentCategory->name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $contentCategory->decription }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $contentCategory->status }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $contentCategory)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.content-categories.edit', $contentCategory) }}"
                            ><i class="fa-sharp fa-solid fa-pen"></i></x-ui.action
                        >
                        @endcan @can('delete', $contentCategory)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $contentCategory->id }})"
                            ><i class="fa-sharp fa-solid fa-trash"></i></x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="4"
                        >No {{ __('crud.contentCategories.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $contentCategories->links() }}</div>
    </x-ui.container.table>
</div>
