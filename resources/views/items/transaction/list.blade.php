@extends('layouts.app')
@section('title', __('app.transactions'))

@section('css')
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection
		@section('content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
					<x-breadcrumb :langArray="[
											'item.items',
											'app.transactions',
										]"/>

                    <div class="card mb-4 shadow-sm border-0">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 border-end d-flex justify-content-center align-items-center bg-light" style="min-height:220px;">
                                <img src="{{ url('/item/getimage/' . $item->image_path) }}" class="img-fluid rounded" alt="Item Image" style="max-height:180px; object-fit:contain;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h4 class="card-title fw-bold mb-0">{{ $item->name }}</h4>
                                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-outline-primary" title="{{ __('app.edit') }}">
                                            <i class="bx bx-edit"></i> {{ __('app.edit') }}
                                        </a>
                                    </div>
                                    <div class="d-flex flex-wrap gap-4 align-items-center mb-3">
                                        <div>
                                            <span class="text-muted small">{{ __('item.stock_quantity') }}</span>
                                            <div class="fw-semibold text-primary">
                                                <i class='bx bxs-building align-middle'></i>
                                                {{ $formatNumber->formatQuantity($item->current_stock) }}
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-muted small">{{ __('app.price') }}/{{ __('unit.unit') }}</span>
                                            <div class="fw-semibold">
                                                <span class="price h5 text-success">{{ $formatNumber->formatWithPrecision($item->sale_price, comma:true) }}</span>
                                                <span class="text-muted">/{{ $item->baseUnit->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4 text-muted">{{ __('item.code') }}#</dt>
                                        <dd class="col-sm-8 mb-2">{{ $item->item_code }}</dd>

                                        <dt class="col-sm-4 text-muted">{{ __('item.category.category') }}</dt>
                                        <dd class="col-sm-8 mb-2">{{ $item->category->name }}</dd>

                                        <dt class="col-sm-4 text-muted">{{ __('item.item_type') }}</dt>
                                        <dd class="col-sm-8 mb-2">{{ ucfirst($item->tracking_type) }}</dd>

                                        <dt class="col-sm-4 text-muted">{{ __('app.description') }}</dt>
                                        <dd class="col-sm-8">{{ $item->description }}</dd>

                                        <dt class="col-sm-4 text-muted">{{ __('item.avg_purchase_price') }}</dt>
                                        <dd class="col-sm-8 mb-2">
                                            {{ $formatNumber->formatWithPrecision($item->avg_purchase_price ?? 0, comma:true) }}
                                        </dd>

                                        <dt class="col-sm-4 text-muted">{{ __('item.avg_sale_price') }}</dt>
                                        <dd class="col-sm-8 mb-2">
                                            {{ $formatNumber->formatWithPrecision($item->avg_sale_price ?? 0, comma:true) }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">

					<div class="card-header px-4 py-3 d-flex justify-content-between">
					    <!-- Other content on the left side -->
					    <div>
					    	<h5 class="mb-0 text-uppercase">{{ __('app.transactions') }}</h5>
					    </div>


					</div>
					<div class="card-body">

						<div class="table-responsive">
                        <form class="row g-3 needs-validation" id="datatableForm" action="{{ route('item.delete') }}" enctype="multipart/form-data">
                            {{-- CSRF Protection --}}
                            @csrf
                            @method('POST')
                            <input type="hidden" id="item_id" value="{{ $item->id }}">
							<table class="table table-striped table-bordered border w-100" id="datatable">
								<thead>
									<tr>
										<th class="d-none"><!-- Which Stores ID & it is used for sorting --></th>
										<th>{{ __('app.date') }}</th>
										<th>{{ __('app.reference_no') }}</th>
										<th>{{ __('app.transaction_type') }}</th>
										<th>{{ __('item.price_per_unit') }}</th>
										<th>{{ __('item.quantity') }}</th>
										<th>{{ __('item.stock_impact') }}</th>
										<th>{{ __('unit.unit') }}</th>
									</tr>
								</thead>
							</table>
                        </form>
						</div>
					</div>
				</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		@endsection
@section('js')
<script src="{{ versionedAsset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ versionedAsset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ versionedAsset('custom/js/common/common.js') }}"></script>
<script src="{{ versionedAsset('custom/js/items/item-transaction-list.js') }}"></script>
@endsection
