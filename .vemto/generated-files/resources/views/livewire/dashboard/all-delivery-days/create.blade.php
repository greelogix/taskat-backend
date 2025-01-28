<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link
            href="{{ route('dashboard.all-delivery-days.index') }}"
            >{{ __('crud.allDeliveryDays.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.allDeliveryDays.itemTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.allDeliveryDays.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="sub_service_id"
                        >{{
                        __('crud.allDeliveryDays.inputs.sub_service_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.sub_service_id"
                        name="sub_service_id"
                        id="sub_service_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($subServices as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.sub_service_id" />
                </div>

                <div class="w-full">
                    <x-ui.label for="name"
                        >{{ __('crud.allDeliveryDays.inputs.name.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.name"
                        name="name"
                        id="name"
                        placeholder="{{ __('crud.allDeliveryDays.inputs.name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="description"
                        >{{ __('crud.allDeliveryDays.inputs.description.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.textarea
                        class="w-full"
                        wire:model="form.description"
                        rows="6"
                        name="description"
                        id="description"
                        placeholder="{{ __('crud.allDeliveryDays.inputs.description.placeholder') }}"
                    />
                    <x-ui.input.error for="form.description" />
                </div>

                <div class="w-full">
                    <x-ui.label for="price"
                        >{{ __('crud.allDeliveryDays.inputs.price.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.number
                        class="w-full"
                        wire:model="form.price"
                        name="price"
                        id="price"
                        placeholder="{{ __('crud.allDeliveryDays.inputs.price.placeholder') }}"
                        step="1"
                    />
                    <x-ui.input.error for="form.price" />
                </div>

                <div class="w-full">
                    <x-ui.label for="status"
                        >{{ __('crud.allDeliveryDays.inputs.status.label')
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
                    <x-ui.button type="submit">Save</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
