<div>
    <div class=" bg-white shadow-sm py-4 border-t-2 border-gray-100 rounded-md relative">
        <div class="mb-4 px-4 [&>*:nth-child(even)]:bg-[#F6F9FF] [&>*:nth-child(even)]:dark:bg-gray-600">
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Gawa</div>
                <div class="">{{ number_format($report?->gawa, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Form</div>
                <div class="">{{ number_format($report?->form, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Mauzo Cash</div>
                <div class="">{{ number_format($report?->mauzo_cash, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Mauzo Mpesa</div>
                <div class="">{{ number_format($report?->mauzo_mpesa, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Posho</div>
                <div class="">{{ number_format($report?->allowance, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Mtaji Mpesa</div>
                <div class="">{{ number_format($report?->mtaji_mpesa, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Matumizi Cash</div>
                <div class="">{{ number_format($report?->expenditure_cash, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Matumizi Mpesa</div>
                <div class="">{{ number_format($report?->expenditure_mpesa, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Support In</div>
                <div class="">{{ number_format($report?->support_in, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1">
                <div class="font-bold text-gray-600">Support Out</div>
                <div class="">{{ number_format($report?->support_out, 2) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 py-1 bg-gray-200">
                <div class="font-bold text-gray-700 text-lg">Total</div>
                <div class="font-bold text-lg">{{ number_format($total, 2) }}</div>
            </div>
        </div>
        <div class="{{ $fetching_report ? 'absolute top-0 left-0 right-0 bottom-0 h-full text-center items-center bg-gray-700/20 rounded-lg' : 'hidden' }}">
            <div class="x-8 py-4 rounded-lg mt-28">
                <i class="fa fa-spinner fa-spin text-7xl"></i>
            </div>
        </div>
    </div>
</div>
