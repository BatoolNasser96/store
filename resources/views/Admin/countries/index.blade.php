@extends('layouts.admin')

@section('search')

<form method="get" action="{{ route('admin.countries.search') }}" class="form-inline">
	<input type="text" name="name" placeholder="Search Country Name..." class="form-control" value="{{ $name }}" style="display:inline;border: none;    width: 100%;">
    <button type="submit" style=" background: none; border: none;padding: 0px;">
	<a class="fas fa-search" style="color:#fff" ></a></button>
   </form>
@endsection
@section('content')


@if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
@endif


@if (session('error'))
	@component('components.alert')
		@slot('type', 'danger')
	 	{{ session('error') }}
	@endcomponent
@endif



<div class="col-lg-12  order-lg-1 order-xl-1" style="top:30px;">
	<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
		<div class="kt-portlet__head-label" style=" display:block;">
			<h3 class="kt-portlet__head-title" style="color:#a3a3a9;">
			{{ __('Countries')}} <i class="kt-menu__link-icon fa fa-globe"></i>
			</h3>
			</div>
		
	</div>
	<!--begin:: Widgets/Activity-->
	<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
		<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x" style="min-height:30px;height: 30px;">
			<div class="kt-portlet__head-label" style=" display:block;">
				<h5 class="kt-portlet__head-title" style="font-size: 12px; color:#a3a3a9; padding-top:13px;">
				<a data-toggle="modal" data-target="#add-country"> {{ __('Add New Country')}}</a></h5>
			</div>
			
	</div>
	<div class="kt-portlet__body kt-portlet__body--fit col-lg-12" style="margin-top:80px;">
		<div class="kt-widget17">
			<div class="kt-widget17__stats">
			
				
				@foreach ($countries as $country)
				<div class="kt-widget17__items ">
					<div class="kt-widget17__item col-lg-4">
						<span class="kt-widget17__subtitle" style="display:inline;">
						{{ $country->id }}/{{ $country->name }}
						</span>

						<span style="display:block;">
						<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-country{{$country->id}}">
						<i class="fas fa-plus" ></i></a>
						<form method="post" class="form-inline" action="{{ route('admin.countries.delete', ['id' => $country->id]) }}" style="display:inline;">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger">
						<i class="fas fa-minus"></i></button>
						</form>

						</span>
					</div>
					</div>
				@endforeach
					
			
			
			</div>
		</div>
	</div>
</div>
<div id="add-country" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{__('Add New Country')}}</h4>
		<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
      </div>
      <div class="modal-body">
	  
		<form method="post" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data" >
			@csrf
			<div class="form-group">
				<label class="control-label">{{ __('Name')}}</label>
				<div>
					<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
					@error('name')
					<p class="text-danger">{{ $message }}</p>
					@enderror
				</div>
			</div>	

			<button type="submit" class="btn btn-primary">Save</button>
		</form>
      </div>
    </div>

  </div>
</div>
<!--end:: Widgets/Activity-->

@foreach(\App\Country::all() as $country)
<div id="edit-country{{$country->id}}" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">{{__('Edit')}} {{ $country->name }}</h4>
			<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
		</div>
		<div class="modal-body">
		<form method="post" action="{{ route('admin.countries.update', ['id' => $country->id]) }}" enctype="multipart/form-data">
			@method('PUT')
			@csrf
			<div class="form-group">
				<label class="control-label">{{__('Name')}}</label>
				<div>
					<input type="text" name="name" value="{{ $country->name }}" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
		</form>
		</div>
		</div>

	</div>
</div>
@endforeach
</div>


@endsection			

@push('js')
	<script>
	@if ($errors->any())
	$('#add-country').modal('show');
	@endif
	</script>
@endpush