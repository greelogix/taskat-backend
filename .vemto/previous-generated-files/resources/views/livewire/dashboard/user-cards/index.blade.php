<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.userCards.collectionTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.userCards.collectionTitle') }}..."
        />

        @can('create', App\Models\UserCard::class)
        <a wire:navigate href="{{ route('dashboard.user-cards.create') }}">
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
                wire:click="delete({{ $deletingUserCard }})"
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
                <x-ui.table.header for-crud wire:click="sortBy('holder_name')"
                    >{{ __('crud.userCards.inputs.holder_name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('card_number')"
                    >{{ __('crud.userCards.inputs.card_number.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('valid_date')"
                    >{{ __('crud.userCards.inputs.valid_date.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('default')"
                    >{{ __('crud.userCards.inputs.default.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($userCards as $userCard)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $userCard->holder_name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $userCard->card_number }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $userCard->valid_date }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $userCard->default }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $userCard)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.user-cards.edit', $userCard) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $userCard)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $userCard->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="5"
                        >No {{ __('crud.userCards.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $userCards->links() }}</div>
    </x-ui.container.table>
</div>
