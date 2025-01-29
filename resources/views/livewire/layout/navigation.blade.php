<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true); } }; ?>

<div class="flex">
<style>
.active {
 font-weight: bold;
 background:#f7fafc;
}
</style>
    <!-- Sidebar -->
      <div class="w-64 text-white p-2 bg-grey absolute top-16 hide-on-small" style="top: 65px; background: white; height: 93%; box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); position: fixed; z-index: 1;">
        <!-- Sidebar Content -->
        <div class="ml-3 col-12">
            <div class="w-64 text-white p-4">
                <div class="ml-3 col-12">
                    <!-- Services -->
                    @can('view-any', App\Models\Service::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.services.index') }}" class="text-sm font-sans font-medium hover:text-black {{ request()->routeIs('dashboard.services.index') ? 'active' : '' }}">
                        <span class="me-3 font-larger"><i class="fa fa-cogs text-black"></i> </span>{{ __('navigation.services') }}
                    </x-dropdown-link>
                    @endcan
                    <!-- Sub-Services -->
                    @can('view-any', App\Models\SubService::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.sub-services.index') }}" class="text-sm font-sans font-medium {{ request()->routeIs('dashboard.sub-services.index') ? 'active' : '' }}">
                        <span class="me-3 font-larger"><i class="fa fa-layer-group text-black"></i> </span>{{ __('navigation.sub_services') }}
                    </x-dropdown-link>
                    @endcan
                
                    <!-- Sub-Service Templates -->
                    @can('view-any', App\Models\SubServiceTemplate::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.sub-service-templates.index') }}" class="text-sm font-sans font-medium {{ request()->routeIs('dashboard.sub-service-templates.index') ? 'active' : '' }}">
                        <span class="me-3 font-larger"><i class="fa fa-file-alt text-black"></i> </span>{{ __('navigation.sub_service_templates') }}
                    </x-dropdown-link>
                    @endcan
                
                    <!-- Delivery Days -->
                    @can('view-any', App\Models\DeliveryDays::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.all-delivery-days.index') }}" class="text-sm font-sans font-medium {{ request()->routeIs('dashboard.all-delivery-days.index') ? 'active' : '' }}">
                        <span class="me-3 font-larger"><i class="fa fa-calendar-day text-black"></i> </span>{{ __('navigation.all_delivery_days') }}
                    </x-dropdown-link>
                    @endcan
                
                    <!-- Content Categories -->
                    @can('view-any', App\Models\ContentCategory::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.content-categories.index') }}" class="text-sm font-sans font-medium {{ request()->routeIs('dashboard.content-categories.index') ? 'active' : '' }}">
                        <span class="me-3 font-larger"><i class="fa fa-tags text-black"></i> </span>{{ __('navigation.content_categories') }}
                    </x-dropdown-link>
                    @endcan
                
                    <!-- Influencers -->
                    @can('view-any', App\Models\Influencer::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.influencers.index') }}" class="text-sm font-sans font-medium {{ request()->routeIs('dashboard.influencers.index') ? 'active' : '' }}">
                        <span class="me-3 font-larger"><i class="fa fa-user-circle text-black"></i> </span>{{ __('navigation.influencers') }}
                    </x-dropdown-link>
                    @endcan
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- Main Content -->
    <div class="flex-1">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100" style=" box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1); position: fixed; width: 100%;">
            <!-- Primary Navigation Menu -->
            <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 logo-res" style="padding-left: 60px">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" wire:navigate>
                             <img src="{{ asset('image/logo-taskat.png') }}" alt="Logo" class="block h-10 w-auto fill-current text-gray-800">
                            </a>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')" wire:navigate>{{ __('Profile') }}</x-dropdown-link>
                                <!-- Authentication -->
                                <button wire:click="logout" class="w-full text-start">
                                    <x-dropdown-link>{{ __('Log Out') }}</x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <!-- Responsive Links -->
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200 px-4">
                        <div class="mt-3 space-y-1">
                        <!-- Services -->
                    @can('view-any', App\Models\Service::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.services.index') }}" class="text-sm font-sans font-medium">
                        <span class="me-3 font-larger"><i class="fa fa-cogs text-black"></i> </span>{{ __('navigation.services') }}
                    </x-dropdown-link>
                    @endcan
            
                    <!-- Sub-Services -->
                    @can('view-any', App\Models\SubService::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.sub-services.index') }}" class="text-sm font-sans font-medium">
                        <span class="me-3 font-larger"><i class="fa fa-layer-group text-black"></i> </span>{{ __('navigation.sub_services') }}
                    </x-dropdown-link>
                    @endcan
            
                    <!-- Sub-Service Templates -->
                    @can('view-any', App\Models\SubServiceTemplate::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.sub-service-templates.index') }}" class="text-sm font-sans font-medium">
                        <span class="me-3 font-larger"><i class="fa fa-file-alt text-black"></i> </span>{{ __('navigation.sub_service_templates') }}
                    </x-dropdown-link>
                    @endcan
            
                    <!-- Delivery Days -->
                    @can('view-any', App\Models\DeliveryDays::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.all-delivery-days.index') }}" class="text-sm font-sans font-medium">
                        <span class="me-3 font-larger"><i class="fa fa-calendar-day text-black"></i> </span>{{ __('navigation.all_delivery_days') }}
                    </x-dropdown-link>
                    @endcan
            
                    <!-- Content Categories -->
                    @can('view-any', App\Models\ContentCategory::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.content-categories.index') }}" class="text-sm font-sans font-medium">
                        <span class="me-3 font-larger"><i class="fa fa-tags text-black"></i> </span>{{ __('navigation.content_categories') }}
                    </x-dropdown-link>
                    @endcan
            
                    <!-- Influencers -->
                    @can('view-any', App\Models\Influencer::class)
                    <x-dropdown-link wire:navigate href="{{ route('dashboard.influencers.index') }}" class="text-sm font-sans font-medium">
                        <span class="me-3 font-larger"><i class="fa fa-user-circle text-black"></i> </span>{{ __('navigation.influencers') }}
                    </x-dropdown-link>
                    @endcan
                    <x-responsive-nav-link :href="route('profile')" wire:navigate>{{ __('Profile') }}</x-responsive-nav-link>
                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link>{{ __('Log Out') }}</x-responsive-nav-link>
                    </button>
                    </div>
                </div>
            </div>
        </nav>
        </header>

        <!-- Page Content -->
        <div class="pt-6">
            <!-- Your page content goes here -->
        </div>
    </div>
</div>