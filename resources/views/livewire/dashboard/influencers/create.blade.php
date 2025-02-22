<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.influencers.index') }}"
            >{{ __('crud.influencers.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.influencers.itemTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.influencers.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="name"
                        >{{ __('crud.influencers.inputs.name.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.name"
                        name="name"
                        id="name"
                        placeholder="{{ __('crud.influencers.inputs.name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="bio"
                        >{{ __('crud.influencers.inputs.bio.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.textarea
                        class="w-full"
                        wire:model="form.bio"
                        rows="6"
                        name="bio"
                        id="bio"
                        placeholder="{{ __('crud.influencers.inputs.bio.placeholder') }}"
                    />
                    <x-ui.input.error for="form.bio" />
                </div>

                <div class="w-full">
                    <x-ui.label for="lat"
                        >{{ __('crud.influencers.inputs.lat.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.lat"
                        name="lat"
                        id="lat"
                        placeholder="{{ __('crud.influencers.inputs.lat.placeholder') }}"
                    />
                    <x-ui.input.error for="form.lat" />
                </div>

                <div class="w-full">
                    <x-ui.label for="long"
                        >{{ __('crud.influencers.inputs.long.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.long"
                        name="long"
                        id="long"
                        placeholder="{{ __('crud.influencers.inputs.long.placeholder') }}"
                    />
                    <x-ui.input.error for="form.long" />
                </div>

                <div class="w-full">
                    <x-ui.label for="address"
                        >{{ __('crud.influencers.inputs.address.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.address"
                        name="address"
                        id="address"
                        placeholder="{{ __('crud.influencers.inputs.address.placeholder') }}"
                    />
                    <x-ui.input.error for="form.address" />
                </div>

                <div class="w-full">
                    <x-ui.label for="image"
                        >{{ __('crud.influencers.inputs.image.label')
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
                    <x-ui.button type="submit" style="background: #033F9D !important;">Submit</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
