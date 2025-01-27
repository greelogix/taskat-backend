<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.services.index') }}"
            >{{ __('crud.services.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Edit {{ __('crud.services.itemTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <x-ui.toast on="saved"> Service saved successfully. </x-ui.toast>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Edit {{ __('crud.services.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="title"
                        >{{ __('crud.services.inputs.title.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.title"
                        name="title"
                        id="title"
                        placeholder="{{ __('crud.services.inputs.title.placeholder') }}"
                    />
                    <x-ui.input.error for="form.title" />
                </div>

                <div class="w-full">
                    <x-ui.label for="description"
                        >{{ __('crud.services.inputs.description.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.textarea
                        class="w-full"
                        wire:model="form.description"
                        rows="6"
                        name="description"
                        id="description"
                        placeholder="{{ __('crud.services.inputs.description.placeholder') }}"
                    />
                    <x-ui.input.error for="form.description" />
                </div>

                <div class="w-full">
                    <x-ui.label for="image"
                        >{{ __('crud.services.inputs.image.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.image
                        :src="$form->newImage ? Storage::url($form->newImage) : Storage::url($form->image)"
                        wire:model="form.newImage"
                        x-on:removed="$form->deleteImage()"
                        class="w-full"
                        id="image"
                        name="image"
                    />
                    <x-ui.input.error for="form.newImage" />
                </div>
            </div>

            <div class="flex justify-between mt-4 border-t border-gray-50 p-4">
                <div>
                    <!-- Other buttons here -->
                </div>
                <div>
                    <x-ui.button type="submit" style="background: #033F9D !important;">Update</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
