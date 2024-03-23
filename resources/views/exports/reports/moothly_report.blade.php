<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 dark:bg-gray-700">
    <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-100 dark:bg-gray-800">
        <tr>
            <th colspan="12" rowspan="2"
                style="text-transform: uppercase; text-align: center; font-size: 20; font-weight: bold;">REHOBOTH MONTHLY
                REPORT {{ $date->format('F Y') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th colspan="12"></th>
        </tr>
        <tr style="font-weight: 500;">
            <th style="font-weight: 500;">S/No.</th>
            <th style="font-weight: 500;">Day</th>
            <th style="font-weight: 500;">Gawa</th>
            <th style="font-weight: 500;">Form</th>
            <th style="font-weight: 500;">Mauzo Cash</th>
            <th style="font-weight: 500;">Mauzo Mpesa</th>
            <th style="font-weight: 500;">Posho</th>
            <th style="font-weight: 500;">Mtaji Mpesa</th>
            <th style="font-weight: 500;">Matumizi Cash</th>
            <th style="font-weight: 500;">Matumizi Mpesa</th>
            <th style="font-weight: 500;">Support In</th>
            <th style="font-weight: 500;">Support Out</th>
        </tr>
        @foreach ($data as $dt)
            <tr>
                <th>
                    {{ $loop->iteration }}</th>
                <td>
                    {{ explode('-', $dt->date)[2] }}</td>
                <td>
                    {{ number_format($dt->gawa) == 0 ? '-' : number_format($dt->gawa) }}
                </td>
                <td>
                    {{ number_format($dt->form) == 0 ? '-' : number_format($dt->form) }}
                </td>
                <td>
                    {{ number_format($dt->mauzo_cash) == 0 ? '-' : number_format($dt->mauzo_cash) }}
                </td>
                <td>
                    {{ number_format($dt->mauzo_mpesa) == 0 ? '-' : number_format($dt->mauzo_mpesa) }}
                </td>
                <td>
                    {{ number_format($dt->allowance) == 0 ? '-' : number_format($dt->allowance) }}
                </td>
                <td>
                    {{ number_format($dt->mtaji_mpesa) == 0 ? '-' : number_format($dt->mtaji_mpesa) }}
                </td>
                <td>
                    {{ number_format($dt->expenditure_cash) == 0 ? '-' : number_format($dt->expenditure_cash) }}
                </td>
                <td>
                    {{ number_format($dt->expenditure_mpesa) == 0 ? '-' : number_format($dt->expenditure_mpesa) }}
                </td>
                <td>
                    {{ number_format($dt->support_in) == 0 ? '-' : number_format($dt->support_in) }}
                </td>
                <td>
                    {{ number_format($dt->support_out) == 0 ? '-' : number_format($dt->support_out) }}
                </td>
            </tr>
        @endforeach

    </tbody>
    {{-- @php
        use \App\Http\Controllers\Reports\MonthlyReportController; 
        $totals = MonthlyReportController::fetchTotals($date->format('m'), $date->format('Y'));
    @endphp --}}
        @if (count($data) > 0)
            @foreach ($totals as $total)
                <tfoot>
                    <tr>
                        <th colspan="2" style="font-weight: 500;">Total</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->gawa) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->form) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->mauzo_cash) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->mauzo_mpesa) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->allowance) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->mtaji_mpesa) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->expenditure_cash) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->expenditure_mpesa) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->support_in) }}</th>
                        <th style="font-weight: 500;">
                            {{ number_format($total->support_out) }}</th>
                    </tr>
                </tfoot>
                
            @endforeach ($totals)
        @endif
</table>
