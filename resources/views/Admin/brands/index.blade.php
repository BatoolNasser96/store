@extends('layouts.admin')
@section('search')

<form method="get" action="{{ route('admin.brands.search') }}" class="form-inline">
	<input type="text" name="name" placeholder="Search Brand Name..." class="form-control" value="{{ $name }}" style="display:inline;border: none;    width: 100%;">
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


	
<div class="col-lg-12 order-lg-1 order-xl-1" style="top:30px;">
	<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
			<div class="kt-portlet__head-label" style=" display:block;">
				<h3 class="kt-portlet__head-title" style="color:#a3a3a9;">
				{{ __('Brands')}} 
				<i class="kt-menu__link-icon fa fa-city"></i>
				</h3>
				</div>
			
	</div>
	<!--begin:: Widgets/Activity-->
	<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
		<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x" style="min-height:30px;height: 30px;">
			<div class="kt-portlet__head-label" style=" display:block;">
				<h5 class="kt-portlet__head-title" style="font-size: 12px; color:#a3a3a9; padding-top:13px;">
				<a data-toggle="modal" data-target="#add-brand"> {{ __('Add New Brand')}}</a></h5>
			</div>
			
	</div>
	<div class="kt-portlet__body kt-portlet__body--fit col-lg-12" style="margin-top:80px;">
		<div class="kt-widget17">
			<div class="kt-widget17__stats">
			
				

				@foreach ($brands as $brand)
				<div class="kt-widget17__items ">
					<div class="kt-widget17__item col-lg-4">
					<img src="{{ asset('storage/'. $brand->img) }}" alt="" style="height: 50px;" />
						<span class="kt-widget17__subtitle" style="display:inline;">
						{{ $brand->id }}/{{ $brand->name }}/{{ $brand->manufacturers->name }}
						</span>

						<span style="display:block;">
						<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-brand{{$brand->id}}">
						<i class="fas fa-plus" ></i></a>
						<form method="post" class="form-inline" action="{{ route('admin.brands.delete', ['id' => $brand->id]) }}" style="display:inline;">
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


<div id="add-brand" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> {{__('Add New Brand')}}</h4>
		<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
      </div>
      <div class="modal-body">
			<form method="post" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data" >
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
     
			<div class="col-lg-9 col-xl-6">
				<div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
					<div class="kt-avatar__holder" style="background-image: url(./assets/media/users/300_10.jpg)">
					
					</div>
					<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
						<i class="fa fa-pen" style="margin-left: 24px;"></i>
						<input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
						@error('img')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</label>
					<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
						<i class="fa fa-times"></i>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">{{ __('Manufacturer')}}</label>
				<div>
					<select name="manufacturer_id" class="form-control @error('manufacturer_id') is-invalid @enderror">
						<option>Select Manufacturer</option>
						@foreach (App\Manufacturer::all() as $manufacturer)
						<option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
						@endforeach
					</select>
					@error('manufacturer_id')
					<p class="text-danger">{{ $message }}</p>
					@enderror
				</div>
			</div>
			<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
			</form>
      </div>
    </div>

  </div>
</div>


@foreach(\App\Brand::all() as $brand)
		<div id="edit-brand{{$brand->id}}" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{__('Edit')}} {{ $brand->name }}</h4>
					<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
				</div>
				<div class="modal-body">
				<form method="post" action="{{ route('admin.brands.update', ['id' => $brand->id]) }}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="form-group">
						<label class="control-label">{{__('Name')}}</label>
						<div>
							<input type="text" name="name" value="{{ $brand->name }}" class="form-control">
						</div>
					</div>

               
					<div class="col-lg-9 col-xl-6">
						<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
							<div class="kt-avatar__holder" style="background-image: url({{ asset('storage/'. $brand->img) }});"></div>
							<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
								<i class="fa fa-pen" style="margin-left: 24px;"></i>
								<input type="file" name="img" class="form-control @error('img') is-invalid @enderror"  accept=".png, .jpg, .jpeg">
							@error('img')
							<p class="text-danger">{{ $message }}</p>
							@enderror
							</label>
							<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
								<i class="fa fa-times"></i>
							</span>
						</div>
					</div>
                    <div class="form-group">
                        <label class="control-label">{{__('Manufacturer')}}</label>
                        <div>
                            <select name="manufacturer_id" class="form-control @error('manufacturer_id') is-invalid @enderror">
                                <option>Select Manufacturer</option>
                                @foreach (App\Manufacturer::all() as $manufacturer)
                                <option value="{{ $manufacturer->id }}" 
                                {{old('manufacturer_id', $manufacturer->manufacturer_id)==$manufacturer->id ? 'selected' :' '}}
                                >
                                {{ $manufacturer->name }}</option>
                                @endforeach
                            </select>
                            @error('manufacturer_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
						<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
				</form>
				</div>
				</div>

			</div>
		</div>
@endforeach

<!--end:: Widgets/Activity-->
</div>




@endsection	

@push('js')
	<script>
	@if ($errors->any())
	$('#add-brand').modal('show');
	@endif
	$('.kt-avatar__upload input[name=img]').change(function (evt) {
		var tgt = evt.target || window.event.srcElement,
			files = tgt.files;

		// FileReader support
		if (FileReader && files && files.length) {
			var fr = new FileReader();
			fr.onload = function () {
				$('.kt-avatar__holder').css('background-image', `url(${fr.result})`);
			}
			fr.readAsDataURL(files[0]);
		}

		// Not supported
		else {
			// fallback -- perhaps submit the input to an iframe and temporarily store
			// them on the server until the user's session ends.
		}
	});
	</script>
@endpush