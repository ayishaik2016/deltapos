<!DOCTYPE html>
<html lang="ar" dir="{{ $appDirection }}">
<head>
    <meta charset="UTF-8">
    <title>{{ $printData['name'] }}</title>
    @include('print.common.css')
</head>
<body onload="window.print();">
    <div class="invoice-container">
        <span class="invoice-name">{{ $printData['name'] }}</span>
        <div class="invoice">
            <table class="header">
                <tr>
                    @include('print.common.header')

                    <td class="bill-info">
                        <span class="bill-number">#: {{ $expense->expense_code }}</span><br>
                        <span class="cu-fs-16">{{ __('app.date') }}: {{ $expense->formatted_expense_date }}</span><br>
                        <span class="cu-fs-16">{{ __('app.time') }}: {{ $expense->format_created_time }}</span><br>
                    </td>
                </tr>
            </table>

            <table class="addresses">
                <tr>
                    <td class="address" colspane="2">
                        <span class="fw-bold cu-fs-18">{{ __('expense.expense_category') }}</span> :
                        <span>{{ $expense->category->name }}</span>
                        @if($expense->subcategory)
                        <br>
                        <span class="fw-bold cu-fs-18">{{ __('expense.subcategory.subcategory') }}</span> :
                        <span>{{ $expense->subcategory->name }}</span>
                        @endif

                    </td>
                </tr>
            </table>

        <table class="table-bordered custom-table table-compact" id="item-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('item.item') }}</th>
                    <th>{{ __('app.qty') }}</th>
                    <th>{{ __('app.price_per_unit') }}</th>
                    <th>{{ __('app.total') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach($expenseItems as $items)
                <tr>
                   <td class="no">{{ $i++ }}</td>
                   <td>
                    {{ $items->itemDetails->name }}
                    <br>
                    <small>{{ $items->note }}</small>
                   </td>
                   <td class="">
                        {{ $formatNumber->formatQuantity($items->quantity) }}
                    </td>
                    <td class="text-end">
                        {{ $formatNumber->formatWithPrecision($items->unit_price) }}
                    </td>
                    <td class="text-end">
                        {{ $formatNumber->formatWithPrecision($items->total) }}
                    </td>

                </tr>
                @endforeach

            </tbody>
            <tfoot class="fw-bold">
                <tr>
                    <td colspan="4" class="text-end">{{ __('app.round_off') }}</td>
                    <td class="text-end">{{ $formatNumber->formatWithPrecision($expense->round_off) }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-end">{{ __('app.grand_total') }}</td>
                    <td class="text-end">{{ $formatNumber->formatWithPrecision($expense->grand_total) }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-end">{{ __('payment.paid_amount') }}</td>
                    <td class="text-end">{{$formatNumber->formatWithPrecision($expense->paid_amount)}}</td>
                </tr>
            </tfoot>

        </table>



        @include('print.common.bank-signature', ['hideBankDetails'=> true])


    </div>
    </div>
</body>
</html>
