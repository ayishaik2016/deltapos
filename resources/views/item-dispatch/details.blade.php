@extends('layouts.app')
@section('title', __('app.print'))

		@section('content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<x-breadcrumb :langArray="[
											'item.stock',
                                            'warehouse.item_dispatch_list',
                                            'app.print',
										]"/>
				<div class="row">
					<div class="col-12 col-lg-12">

                        @include('layouts.session')

                        <input type="hidden" id="base_url" value="{{ url('/') }}">

                        <div class="card">
                    <div class="card-body">
                        <div class="toolbar hidden-print">
                                <div class="text-end">
                                    <a href="{{ route('item_dispatch.print', ['id' => $itemDispatch->id]) }}" target="_blank" class="btn btn-outline-secondary px-4"><i class="bx bx-printer mr-1"></i>{{ __("app.print") }}</a>

                                    <a href="{{ route('item_dispatch.pdf', ['id' => $itemDispatch->id]) }}" target="_blank" class="btn btn-outline-danger px-4"><i class="bx bxs-file-pdf mr-1"></i>{{ __("app.pdf") }}</a>

                                </div>
                                <hr/>
                            </div>
                        <div id="printForm">
                            <div class="invoice overflow-auto">
                                <div class="min-width-600">
                                    <header>
                                        <div class="row">
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <img src={{ "/company/getimage/" . app('company')['colored_logo'] }} width="80" alt="" />
                                                </a>
                                            </div>
                                            <div class="col company-details">
                                                <h2 class="name">
                                                    <a href="javascript:;">
                                                    {{ app('company')['name'] }}
                                                    </a>
                                                </h2>
                                                <div>{{ app('company')['address'] }}</div>
                                            </div>
                                        </div>
                                    </header>
                                    <main>
                                        <div class="row contacts">
                                            <div class="col invoice-to">
                                                <div class="text-gray-light fw-bold text-uppercase">
                                                    <p>{{ __('vehicle.vehicle') }}</p>
                                                    <h3>{{ $itemDispatch->vehicle->name }}</h3>
                                                    <h6>{{ $itemDispatch->vehicle->vehicle_number }}</h6>
                                                </div>
                                            </div>

                                            <div class="col invoice-to">
                                                <div class="text-gray-light fw-bold text-uppercase">
                                                    <p>{{ __('vehicle.driver') }}</p>
                                                    <h3>{{ $itemDispatch->driver->first_name . ' ' .  $itemDispatch->driver->last_name}}</h3>
                                                </div>
                                            </div>

                                            @if($itemDispatch->salesman) 
                                                <div class="col invoice-to">
                                                    <div class="text-gray-light fw-bold text-uppercase">
                                                        <p>{{ __('vehicle.salesman') }}</p>
                                                            <h3>{{ $itemDispatch->salesman->first_name . ' ' .  $itemDispatch->salesman->last_name}}</h3>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col invoice-details">
                                                <h1 class="invoice-id">#{{ $itemDispatch->transaction_id }}</h1>
                                                <div class="date">{{ __('app.date') }}: {{ $itemDispatch->formatted_transaction_date  }}</div>
                                                @if($itemDispatch->reference_no)
                                                    <div class="date">{{ __('app.reference_no') }}: {{ $itemDispatch->reference_no  }}</div>
                                                @endif

                                            </div>
                                        </div>
                                        <table id="printInvoice">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th>#</th>
                                                    <th class="text-left">{{ __('item.item') }}</th>
                                                    <th class="text-left">{{ __('app.price_per_unit') }}</th>
                                                    <th class="text-left">{{ __('app.qty') }}</th>
                                                    <th class="text-left">{{ __('item.sold_quantity') }}</th>
                                                    <th class="text-left">{{ __('item.remaining_quantity') }}</th>
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
                                                        <h3>
                                                            <!-- Service Name -->
                                                            {{ $transaction->item->name }}
                                                        </h3>
                                                        <small>
                                                            <!-- Description -->
                                                            {{ $transaction->description }}
                                                        </small>
                                                   </td>
                                                   <td class="">
                                                        {{ $formatNumber->formatWithPrecision($transaction->purchase_price, comma:false) }}
                                                    </td>
                                                   <td class="">
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
                                            </tbody>
                                            <tfoot>
                                                @php
                                                $columnCount = 5;
                                                @endphp
                                                <tr>
                                                    <td colspan="{{$columnCount}}" class="tfoot-first-td">{{ __('warehouse.total_no_of_quantity') }}</td>
                                                    <td class="text-start">{{ $formatNumber->formatQuantity($itemDispatch->total_quantity) }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="{{$columnCount}}" class="tfoot-first-td">{{ __('warehouse.total_no_of_sold_quantity') }}</td>
                                                    <td class="text-start">{{ $formatNumber->formatQuantity($itemDispatch->total_sold_quantity) }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="{{$columnCount}}" class="tfoot-first-td">{{ __('warehouse.total_no_of_remaining_quantity') }}</td>
                                                    <td class="text-start">{{ $formatNumber->formatQuantity($itemDispatch->total_remaining_quantity) }}</td>
                                                </tr>
                                                <tr></tr>

                                            </tfoot>
                                        </table>
                                    </main>

                                </div>
                                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>

		@endsection
