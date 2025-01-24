<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.user-cards.index') }}"
            >{{ __('crud.userCards.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Edit {{ __('crud.userCards.itemTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <x-ui.toast on="saved"> UserCard saved successfully. </x-ui.toast>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Edit {{ __('crud.userCards.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="holder_name"
                        >{{ __('crud.userCards.inputs.holder_name.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.holder_name"
                        name="holder_name"
                        id="holder_name"
                        placeholder="{{ __('crud.userCards.inputs.holder_name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.holder_name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="card_number"
                        >{{ __('crud.userCards.inputs.card_number.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.textarea
                        class="w-full"
                        wire:model="form.card_number"
                        rows="6"
                        name="card_number"
                        id="card_number"
                        placeholder="{{ __('crud.userCards.inputs.card_number.placeholder') }}"
                    />
                    <x-ui.input.error for="form.card_number" />
                </div>

                <div class="w-full">
                    <x-ui.label for="valid_date"
                        >{{ __('crud.userCards.inputs.valid_date.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.valid_date"
                        name="valid_date"
                        id="valid_date"
                        placeholder="{{ __('crud.userCards.inputs.valid_date.placeholder') }}"
                    />
                    <x-ui.input.error for="form.valid_date" />
                </div>

                <div class="w-full">
                    <x-ui.label for="default"
                        >{{ __('crud.userCards.inputs.default.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.default"
                        class="w-full"
                        id="default"
                        name="default"
                    >
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </x-ui.input.select>
                    <x-ui.input.error for="default" />
                </div>
            </div>

            <div class="flex justify-between mt-4 border-t border-gray-50 p-4">
                <div>
                    <!-- Other buttons here -->
                </div>
                <div>
                    <x-ui.button type="submit">Save</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
