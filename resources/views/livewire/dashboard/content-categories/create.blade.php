<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link
            href="{{ route('dashboard.content-categories.index') }}"
            >{{ __('crud.contentCategories.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.contentCategories.itemTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.contentCategories.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="name"
                        >{{ __('crud.contentCategories.inputs.name.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.name"
                        name="name"
                        id="name"
                        placeholder="{{ __('crud.contentCategories.inputs.name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="decription"
                        >{{ __('crud.contentCategories.inputs.decription.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.textarea
                        class="w-full"
                        wire:model="form.decription"
                        rows="6"
                        name="decription"
                        id="decription"
                        placeholder="{{ __('crud.contentCategories.inputs.decription.placeholder') }}"
                    />
                    <x-ui.input.error for="form.decription" />
                </div>

                <div class="w-full">
                    <x-ui.label for="status"
                        >{{ __('crud.contentCategories.inputs.status.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.status"
                        class="w-full"
                        id="status"
                        name="status"
                    >
                        <option value="">Select</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </x-ui.input.select>
                    <x-ui.input.error for="status" />
                </div>
            </div>

            <div class="flex justify-between mt-4 border-t border-gray-50 p-4">
                <div>
                    <!-- Other buttons here -->
                </div>
                <div>
                    <x-ui.button type="submit" style="background: #033F9D !important;">Submit</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
