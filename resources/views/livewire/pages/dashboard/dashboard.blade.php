<div>
    <x-slot name="header">
        @include('includes.breadcrumb', [
            'main' => '',
            'menu' => 'Dashboard',
        ])
    </x-slot>

    <div class="">

        <div
            class="bg-white shadow-sm mb-2 min-h-10 px-2.5 py-2 rounded-t-lg grid md:grid-flow-col grid-cols-1 md:grid-cols-3">
            <div class="flex justify-center md:justify-start">
                <button wire:click.prevent="previous"
                    class="w-full md:w-1/4 flex justify-center space-x-1 px-2 items-center hover:bg-red-50 bg-gray-100 py-0.5 rounded-lg hover:shadow-sm hover:text-gray-600 font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                    </svg>
                </button>
            </div>
            <div class="text-center text-xl font-bold text-gray-700">{{ $date->format('F d, Y') }}</div>
            <div class="flex justify-center md:justify-end">
                @if ($toNext)
                    <button wire:click.prevent="next"
                        class="w-full md:w-1/4 flex justify-center space-x-1 px-2 items-center hover:bg-red-50 bg-gray-100 py-0.5 rounded-lg hover:shadow-sm hover:text-gray-600 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>

                    </button>
                @endif
            </div>

        </div>
        <div class="md:grid md:grid-cols-2 md:gap-4">
            @livewire('pages.dashboard.components.daily-report-list')
            @livewire('pages.dashboard.components.daily-report-chart')
        </div>
    </div>
</div>
