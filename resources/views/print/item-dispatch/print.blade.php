<!DOCTYPE html>
<html lang="ar" dir="{{ $appDirection }}">
<head>
    <meta charset="UTF-8">
    <title>{{ $invoiceData['name'] }}</title>
    @include('print.common.css')
</head>
<body onload="window.print();">
    <div class="invoice-container">
        <span class="invoice-name">{{ $invoiceData['name'] }}</span>
        <div class="invoice">
            <table class="header">
                <tr>
                    @include('print.common.header')

                    <td class="bill-info">
                        <span class="bill-number"># {{ $itemDispatch->transaction_id }}</span><br>
                        <span class="cu-fs-16">{{ __('app.date') }}: {{ $itemDispatch->formatted_transaction_date  }}</span><br>
                        <span class="cu-fs-16">{{ __('app.time') }}: {{ $itemDispatch->format_created_time }}</span><br>
                        @if($itemDispatch->reference_no)
                        <span class="cu-fs-16">{{ __('app.reference_no') }}: {{ $itemDispatch->reference_no  }}</span><br>
                        @endif

                    </td>
                </tr>
                <tr>
                    <td>
                        <p>{{ __('vehicle.vehicle') }}</p>
                        <h3>{{ $itemDispatch->vehicle->name }}</h3>
                        <p>{{ $itemDispatch->vehicle->vehicle_number }}</p>
                    </td>
                    <td>
                        <p>{{ __('vehicle.driver') }}</p>
                        <h3>{{ $itemDispatch->driver->first_name . ' ' .  $itemDispatch->driver->last_name}}</h3>
                    </td>
                    @if($itemDispatch->salesman) 
                        <td>
                            <p>{{ __('vehicle.salesman') }}</p>
                            <h3>{{ $itemDispatch->salesman->first_name . ' ' .  $itemDispatch->salesman->last_name}}</h3>
                        </td>
                    @endif
                </tr>
            </table>

        <table class="table-bordered custom-table table-compact" id="item-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('item.item') }}</th>
                    <th>{{ __('app.price_per_unit') }}</th>
                    <th>{{ __('app.qty') }}</th>
                    <th>{{ __('item.sold_quantity') }}</th>
                    <th>{{ __('item.remaining_quantity') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp

                @foreach($itemDispatch->ItemDispatchTransaction as $transaction)
                <tr>
                    <td class="no">{{ $i++ }}</td>
                    <td class="text-left">
                        <!-- Service Name -->
                        <b>{{ $transaction->item->name }}</b>
                        <!-- Description -->
                        <small>{{ $transaction->description }}</small>
                   </td>
                    <td class="">
                        {{ $formatNumber->formatWithPrecision($transaction->purchase_price, comma:false) }}
                    </td>
                   <td class="text-end">
                        {{ $formatNumber->formatQuantity($transaction->quantity) }}
                    </td>
                    <td class="">
                        {{ $formatNumber->formatQuantity($transaction->sold_quantity) }}
                    </td>
                    <td class="">
                        {{ $formatNumber->formatQuantity($transaction->remaining_quantity) }}
                    </td>
                </tr>
                @endforeach
                <tr class="fw-bold">
                    <td class="text-end" colspan="5">
                            {{ __('warehouse.total_no_of_quantity') }}
                    </td>
                    <td class="text-end">
                            {{ $formatNumber->formatWithPrecision($itemDispatch->ItemDispatchTransaction->sum('quantity')) }}
                    </td>
                </tr>
                <tr class="fw-bold">
                    <td class="text-end" colspan="5">
                            {{ __('warehouse.total_no_of_sold_quantity') }}
                    </td>
                    <td class="text-end">
                            {{ $formatNumber->formatWithPrecision($itemDispatch->ItemDispatchTransaction->sum('sold_quantity')) }}
                    </td>
                </tr>
                <tr class="fw-bold">
                    <td class="text-end" colspan="5">
                            {{ __('warehouse.total_no_of_remaining_quantity') }}
                    </td>
                    <td class="text-end">
                            {{ $formatNumber->formatWithPrecision($itemDispatch->ItemDispatchTransaction->sum('remaining_quantity')) }}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                @php
                    $noteColumns = 5 + app('company')['show_hsn'];
                @endphp
                <tr>
                    <td colspan="{{ $noteColumns }}" class="tfoot-first-td">
                        <span class="invoice-note">{{ __('app.note') }}:<br></span>{{ $itemDispatch->note }}
                    </td>
                </tr>
            </tfoot>

        </table>



    </div>
    </div>
</body>
</html>
