@extends('layouts.app')
@section('title', __('vehicle.create_vehicle'))

		@section('content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<x-breadcrumb :langArray="[
											'vehicle.vehicle',
											'vehicle.list',
											'vehicle.create_vehicle',
										]"/>
				<div class="row">
					<div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header px-4 py-3">
                                <h5 class="mb-0">{{ __('vehicle.details') }}</h5>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" id="vehicleForm" action="{{ route('vehicle.store') }}" enctype="multipart/form-data">
                                    {{-- CSRF Protection --}}
                                    @csrf
                                    @method('POST')

                                    <input type="hidden" id="base_url" value="{{ url('/') }}">
                                    <div class="col-md-6">
                                        <x-label for="name" name="{{ __('app.name') }}" />
                                        <x-input type="text" name="name" :required="true" value=""/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-label for="vehicle_number" name="{{ __('vehicle.vehicle_number') }}" />
                                        <x-input type="text" name="vehicle_number" :required="true" value=""/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-label for="vehicle_type_id" name="{{ __('vehicle.vehicle_type') }}" />
                                        <x-dropdown-vehicle-type selected="" dropdownName="vehicle_type_id" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-label for="status" name="{{ __('app.status') }}" />
                                        <x-dropdown-status selected="" dropdownName='status'/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-label for="description" name="{{ __('app.description') }}" />
                                        <x-textarea name="description" value=""/>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <x-button type="submit" class="primary px-4" text="{{ __('app.submit') }}" />
                                            <x-anchor-tag href="{{ route('dashboard') }}" text="{{ __('app.close') }}" class="btn btn-light px-4" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		@endsection

@section('js')
<script src="{{ versionedAsset('custom/js/vehicle/vehicle.js') }}"></script>
@endsection
