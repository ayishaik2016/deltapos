@extends('layouts.app')
@section('title', __('app.create_role'))

		@section('content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<x-breadcrumb :langArray="[
											'user.users',
											'app.permissions',
											'app.create_role',
										]"/>
				<div class="row">
					<div class="col-12 col-lg-12">

						{{-- Form: Start --}}
						<form class=" needs-validation" id="roleForm" action="{{ route('role.store') }}" enctype="multipart/form-data">
                        {{-- CSRF Protection --}}
                        @csrf
                        @method('POST')

                        <input type="hidden" id="base_url" value="{{ url('/') }}">

                        <div class="card">

                            <div class="card-header px-4 py-3">
                                <h5 class="mb-0">{{ __('app.general') }}</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <x-label for="name" name="{{ __('app.role_name') }}" />
                                        <x-input type="text" name="name" :required="true" value=""/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-label for="status" name="{{ __('app.status') }}" />
                                        <x-dropdown-status selected="" dropdownName='status'/>
                                    </div>
                                </div>

                            </div>

                            <div class="card-header px-4 py-3">
                                <h5 class="mb-0">{{ __('app.permissions') }}</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">
                                                <i class="bx bx-search text-primary"></i>
                                            </span>
                                            <input type="text" id="searchPermissions" class="form-control" placeholder="{{ __('app.search_permissions') }}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered mb-0" id="permissionsTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('app.group') }}</th>
                                                    <th scope="col">
                                                        <input class="form-check-input" type="checkbox" id="select_all">
                                                        <label for="select_all">{{ __('app.select_all') }}</label>
                                                    </th>
                                                    <th scope="col">{{ __('app.permissions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @include('roles-and-permissions.role.permissions')
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">

                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <x-button type="submit" class="primary px-4" text="{{ __('app.submit') }}" />
                                            <x-anchor-tag href="{{ route('dashboard') }}" text="{{ __('app.close') }}" class="btn btn-light px-4" />
                                        </div>
                                    </div>
                            </div>
                        </div>{{-- card --}}
                        </form>
                        {{-- Form: End --}}
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		@endsection

        @section('js')
        <script src="{{ versionedAsset('custom/js/user/permission/role.js') }}"></script>
        @endsection
