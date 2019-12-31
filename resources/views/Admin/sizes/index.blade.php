@extends('layouts.admin')
@section('search')

<form method="get" action="{{ route('admin.sizes.search') }}" class="form-inline">
	<input type="text" name="name" placeholder="Search Size Name..." class="form-control" value="{{ $name }}" style="display:inline;border: none;    width: 100%;">
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
			{{ __('Sizes')}} <i class="kt-menu__link-icon fa fa-star-half-alt"></i>
			</h3>
			</div>
		
	</div>
	<!--begin:: Widgets/Activity-->
	<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
		<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x" style="min-height:30px;height: 30px;">
			<div class="kt-portlet__head-label" style=" display:block;">
				<h5 class="kt-portlet__head-title" style="font-size: 12px; color:#a3a3a9; padding-top:13px;">
				<a data-toggle="modal" data-target="#add-size"> {{ __('Add New Size')}}</a></h5>
			</div>
			
	</div>
	<div class="kt-portlet__body kt-portlet__body--fit col-lg-12" style="margin-top:80px;">
		<div class="kt-widget17">
			<div class="kt-widget17__stats">
			
				
				@foreach ($sizes as $size)
				<div class="kt-widget17__items ">
				<div class="col-lg-4">
					<div class="kt-widget17__item ">
						<span class="kt-widget17__subtitle" style="display:inline;">
						{{ $size->id }}/{{ $size->name }}/
						@foreach($size->parts as $part)
							{{$part->name}}
							@if(!$loop->last)
							,
							@endif
						@endforeach
						</span>
						<span style="display:block;">
						<a class="btn btn-sm btn-info" href="{{ route('admin.sizes.edit', ['id' => $size->id]) }}">
						<i class="fas fa-plus" ></i></a>
						<form method="post" class="form-inline" action="{{ route('admin.sizes.delete', ['id' => $size->id]) }}" style="display:inline;">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger">
						<i class="fas fa-minus"></i></button>
						</form>
						</span>
					</div>
					</div>
					</div>
				@endforeach
					
			
			
			</div>
		</div>
	</div>
	</div>

	<!--end:: Widgets/Activity-->
</div>

<div id="add-size" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{__('Add New Size')}}</h4>
		<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
      </div>
      <div class="modal-body">
	  
	  <form method="post" action="{{ route('admin.sizes.store') }}" enctype="multipart/form-data" >
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
			<div class="form-group">
				@foreach (App\Part::all() as $part)
				<div class="form-ckeck form-check-inline">
				<input class="form-check-input" type="checkbox" name="part[]" value="{{$part->id}}">
				<label class="form-check-label">{{ $part->name }}</label>
				</div>
				@endforeach	
			</div>
			
			<button type="submit" class="btn btn-primary">Save</button>
	  </form>
      </div>
    </div>

  </div>
</div>

@endsection	


@push('js')
	<script>
	@if ($errors->any())
	$('#add-size').modal('show');
	@endif
	</script>
@endpush