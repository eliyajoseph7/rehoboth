<div>
    <x-slot name="header">
        @include('includes.breadcrumb', [
            'main' => 'Reports',
            'menu' => 'Monthly Report',
        ])
    </x-slot>

    <div>
        <div class="py-0">
            <div class="max-w-full mx-auto sm:px-6 lg:px-0">
                <div class="w-full">
                    <div class="bg-white shadow-sm mb-2 min-h-20 rounded-t-lg">
                        <div class="text-center text-3xl font-bold text-gray-700">{{ now()->format('F Y') }}</div>

                    </div>
                    <div class="flex flex-col-reverse md:flex-row md:space-x-3">
                        <div
                            class="min-h-[20vh] dark:bg-gray-800 overflow-hidden sm:rounded-lg items-center w-full float-right">

                            <div class="bg-white shadow-lg border-t-2 border-gray-100 rounded-lg px-2 py-3">
                                <div class="flex items-center justify-between d p-4 dark:bg-gray-700">
                                    <div class="flex">
                                        <div class="relative w-full">
                                            <input type="text" wire:model.live.debounce.300ms="search"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                                placeholder="Search" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table
                                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400 dark:bg-gray-700">
                                        <thead
                                            class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-100 dark:bg-gray-800">
                                            <tr>
                                                <th scope="col" class="px-4 py-3 w-[50px]">S/No.</th>
                                                <th scope="col" class="px-4 py-3 w-[100px] normal-case">Day</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Gawa</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Form</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Mauzo Cash</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Mauzo Mpesa</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Posho</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Mtaji Mpesa</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Matumizi Cash</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Matumizi Mpesa</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Support In</th>
                                                <th scope="col" class="px-4 py-3 text-wrap normal-case">Support Out</th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="[&>*:nth-child(even)]:bg-[#F6F9FF] [&>*:nth-child(even)]:dark:bg-gray-600">
                                            @forelse ($data as $dt)
                                                <tr wire:key="{{ $dt->id }}"
                                                    class="border-b border-gray-100 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="px-4 py-3 w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $loop->iteration }}</th>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ explode('-', $dt->date)[1] }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->gawa) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->form) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->mauzo_cash) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->mauzo_mpesa) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->allowance) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->mtaji_mpesa) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->expenditure_cash) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->expenditure_mpesa) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->support_in) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->support_out) }}</td>
                                                </tr>
                                            @empty
                                                <tr class="bg-gray-50">
                                                    <td class="py-2" colspan="50">
                                                        <div class="flex justify-center">There is nothing currently
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                                {{-- @include('includes.table_pages', [
                                    'data' => $data,
                                ]) --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script data-navigate-once>
            document.addEventListener('livewire:init', () => {

                Livewire.on('reset_payment_method_id', (e) => {
                    $('#payment_method_id').val('').trigger('change')
                });

                Livewire.on('update_payment_method_id_field', (data) => {
                    $('#payment_method_id').val(data).trigger('change')
                });
            });
        </script> --}}
    </div>
</div>
