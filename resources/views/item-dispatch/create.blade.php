@extends('layouts.app')
@section('title', __('warehouse.item_dispatch'))

        @section('content')

        @php 
            $driverId = config('constants.roles.DRIVER');
            $salesmanId = config('constants.roles.SALESMAN');
        @endphp

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <x-breadcrumb :langArray="[
                                            'item.stock',
                                            'warehouse.item_dispatch_list',
                                            'warehouse.new_form',
                                        ]"/>
                <div class="row">
                    <form class="g-3 needs-validation" id="itemDispatchForm" action="{{ route('item_dispatch.store') }}" enctype="multipart/form-data">
                        {{-- CSRF Protection --}}
                        @csrf
                        @method('POST')

                        <input type="hidden" name="row_count" value="0">
                        <input type="hidden" id="base_url" value="{{ url('/') }}">
                        <input type="hidden" id="operation" name="operation" value="save">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header px-4 py-3">
                                        <h5 class="mb-0">{{ __('warehouse.item_dispatch_details') }}</h5>
                                    </div>
                                    <div class="card-body p-4 row g-3">
                                        <div class="col-md-4">
                                            <x-label for="transaction_date" name="{{ __('app.date') }}" />
                                            <div class="input-group mb-3">
                                                <x-input type="text" additionalClasses="datepicker" name="transaction_date" :required="true" value=""/>
                                                <span class="input-group-text" id="input-near-focus" role="button"><i class="fadeIn animated bx bx-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <x-label for="transaction_id" name="{{ __('warehouse.transaction_id') }}" />
                                            <!--  -->
                                            <div class="input-group mb-3">
                                                <x-input type="text" name="prefix_code" :required="true" placeholder="Prefix Code" value="{{ $data['prefix_code'] }}"/>
                                                <span class="input-group-text">#</span>
                                                <x-input type="text" name="count_id" :required="true" placeholder="Serial Number" value="{{ $data['count_id'] }}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <x-label for="vehicle_id" name="{{ __('vehicle.vehicle') }}" />
                                            <x-dropdown-vehicle selected="" dropdownName="vehicle_id" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-label for="driver_id" name="{{ __('vehicle.driver') }}" />
                                            <x-dropdown-roleuser selected="" dropdownName="driver_id" roleName="{{ $driverId }}" :showOnlyUsername='false' />
                                        </div>
                                        <div class="col-md-4">
                                            <x-label for="salesman_id" name="{{ __('vehicle.salesman') }}" />
                                            <x-dropdown-roleuser selected="" dropdownName="salesman_id" roleName="{{ $salesmanId }}" :showOnlyUsername='false' />
                                        </div>
                                        <div class="col-md-4">
                                            <x-label for="reference_no" name="{{ __('app.reference_no') }}" />
                                            <x-input type="text" name="reference_no" :required="false" placeholder="(Optional)" value=""/>
                                        </div>
                                    </div>
                                    <div class="card-header px-4 py-3">
                                        <h5 class="mb-0">{{ __('item.items') }}</h5>
                                    </div>
                                    <div class="card-body p-4 row g-3">
                                            <div class="col-md-3 col-sm-12 col-lg-3">
                                                <x-label for="warehouse_id" name="{{ __('warehouse.warehouse') }}" />
                                                <x-dropdown-warehouse selected="" dropdownName='warehouse_id' />
                                            </div>
                                            <div class="col-md-9 col-sm-12 col-lg-7">
                                                <x-label for="search_item" name="{{ __('item.enter_item_name') }}" />
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fadeIn animated bx bx-barcode-reader text-primary"></i></span>
                                                    <input type="text" id="search_item" value="" class="form-control" required placeholder="Scan Barcode/Search Item/Brand Name">
                                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#itemModal"><i class="bx bx-plus-circle me-0"></i></button>
                                                </div>
                                            </div>

                                            <div class="col-md-12 table-responsive">
                                                <table class="table mb-0 table-striped table-bordered" id="invoiceItemsTable">
                                                    <thead>
                                                        <tr class="text-uppercase">
                                                            <th scope="col">{{ __('app.action') }}</th>
                                                            <th scope="col">{{ __('item.item') }}</th>
                                                            <th scope="col">{{ __('item.stock') }}</th>
                                                            <th scope="col">{{ __('item.quantity') }}</th>
                                                            <th scope="col">{{ __('unit.unit') }}</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="6" class="text-center fw-light fst-italic default-row">
                                                                No items are added yet!!
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="2" class="fw-bold text-end tfoot-first-td">
                                                                {{ __('app.total') }}
                                                                <input type="hidden" name="total_quantity" id="total_quantity" value="0">
                                                                <input type="hidden" name="total_remaining_quantity" id="total_remaining_quantity" value="0">
                                                            </td>
                                                            <td class="fw-bold sum_of_quantity">
                                                                0
                                                            </td>
                                                            <td class="fw-bold text-end"></td>

                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="col-md-8">
                                                <x-label for="note" name="{{ __('app.note') }}" />
                                                <x-textarea name='note' value=''/>
                                            </div>

                                    </div>

                                    <div class="card-header px-4 py-3"></div>
                                    <div class="card-body p-4 row g-3">
                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <x-button type="button" class="primary px-4" buttonId="submit_form" text="{{ __('app.submit') }}" />
                                                    <x-anchor-tag href="{{ route('dashboard') }}" text="{{ __('app.close') }}" class="btn btn-light px-4" />
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!--end row-->
            </div>
        </div>
        <!-- Import Modals -->
        @include("modals.item.serial-tracking")
        @include("modals.item.create")

        @endsection

@section('js')
<script src="{{ versionedAsset('custom/js/autocomplete-item.js') }}"></script>
<script src="{{ versionedAsset('custom/js/item-dispatch/item-dispatch.js') }}"></script>

<script src="{{ versionedAsset('custom/js/items/serial-tracking.js') }}"></script>
<script src="{{ versionedAsset('custom/js/common/common.js') }}"></script>
<script src="{{ versionedAsset('custom/js/modals/item/item.js') }}"></script>
@endsection
