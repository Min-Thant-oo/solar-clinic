<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Doctor Dashboard') }}
        </h2>
    </x-slot>
    <livewire:statistic-component />
    <livewire:recent-appointment />
</div>
