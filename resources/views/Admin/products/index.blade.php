@extends('layouts.admin')
@section('search')

<form method="get" action="{{ route('admin.products.search') }}" class="form-inline">
	<input type="text" name="title" placeholder="Search Product title..." class="form-control" value="{{ $title }}" style="display:inline;border: none; width:50%">

	<select name="company_id" class="form-control ml-1">
		<option value="">All companies </option>
		@foreach (App\Company::all() as $company)								
		<option value="{{ $company->id }}"{{ $company_id == $company->id? ' selected' : '' }}>{{ $company->name }}</option>
		@endforeach
	</select>
	<button type="submit" style=" background: none; border: none;padding: 0px;">
	<a class="fas fa-search" style="color:#fff" ></a></button>
   </form>
@endsection	
@section('content')
<h2> {{ __('Products')}} </h2>
<div class="kt-subheader__toolbar">
	<a href="#" class="">
	</a>
	<a data-toggle="modal" data-target="#add-product" class="btn btn-label-brand btn-bold" style="color:#5d78ff;margin-bottom: 1%;">
	<i class="kt-menu__link-icon fa fa-user-lock fa-lg"></i> {{__('Add product')}} 
	</a>
</div>
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

	
<div class="row">
@foreach ($products as $product)
	<div class="col-xl-3">

		<!--Begin::Portlet-->
		<div class="kt-portlet kt-portlet--height-fluid">
			<div class="kt-portlet__head kt-portlet__head--noborder">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					 {{ $product->id }}
				</div>
			
			</div>
			<div class="kt-portlet__body">

				<!--begin::Widget -->
				<div class="kt-widget kt-widget--user-profile-2">
					<div class="kt-widget__head">
						<div class="kt-widget__media">
						<img class="kt-widget__img kt-hidden-" src="{{ asset('storage/'. $product->img) }}" alt="image" />
						</div>
						<div class="kt-widget__info">
							<a href="#" class="kt-widget__username">
							{{ $product->title }}
							</a>
							<span class="kt-widget__desc">
							{{__('Price:')}}<span style="color:#5578eb;"> {{ $product->price }}$</span>
							</span>
							<span class="kt-widget__desc">
							{{__('Discount:')}}<span style="color:#5578eb;"> {{ $product->discount }}$</span>
							</span>
							<span class="kt-widget__desc">
							{{__('Count:')}}<span style="color:#5578eb;"> {{ $product->quantity }}</span>
							</span>
						</div>
					</div>
					<div class="kt-widget__body">
						
						<div class="kt-widget__item">
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('size:')}}</span>
								<a href="#" class="kt-widget__data">	
									@foreach($product->sizes as $size)
										{{$size->name}}
										@if(!$loop->last)
										,
										@endif
									@endforeach
								</a>
							</div>
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('Color:')}}</span>
								<a href="#" class="kt-widget__data">
								@foreach($product->colors as $color)
								<span href="#" class="kt-widget__data" style="background-color:{{ $color->name }};color:#fff; padding:5px;margin-right: 2px; border-radius:50%">
									{{$color->name}}
									
									</span>
								@endforeach
								</a>
							</div>
							
						</div>
					</div>
					<div class="kt-widget__footer">
						<a data-toggle="modal" data-target="#show-product{{$product->id}}">
							@csrf
							<button type="submit" class="btn btn-label-success btn-lg btn-upper"> 
							<i class="fas fa-check-circle" style="padding-left: 3px;padding-right: 5px;"></i>
							</button>
						</a>
					    <form  action="{{ route('admin.products.edit', ['id' => $product->id]) }}">
							@csrf
							<button type="submit" class="btn btn-label-brand btn-lg btn-upper"> 
							<i class="fas fa-plus-circle" style="padding-left: 3px;padding-right: 5px;"></i>
							</button>
						</form>

						<form method="post" action="{{ route('admin.products.delete', ['id' => $product->id]) }}">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-label-danger btn-lg btn-upper">
							<i class="fas fa-times-circle"  style="padding-left: 3px;padding-right: 5px;"></i>
							</button>
						</form>
					</div>
				</div>
               
				<!--end::Widget -->
			</div>
		</div>

		<!--End::Portlet-->
	</div>
@endforeach						
</div>
<div id="add-product" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{__('Add New Product')}}</h4>
		<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
      </div>
      <div class="modal-body">
      <div class="kt-portlet">
		<div id="errors"></div>
		<div class="kt-portlet__body kt-portlet__body--fit">
			<div class="kt-grid">
				<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper" style="padding: 10px;">

					<!--begin: Form Wizard Form-->
					<form class="kt-form" method="post" action="{{ route('admin.products.store') }}"  enctype="multipart/form-data" id="kt_apps_user_add_user_form" novalidate="novalidate">
						@csrf
						<!--begin: Form Wizard Step 1-->
						<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
							<div class="kt-heading kt-heading--md">Product Details:</div>
							<div class="kt-section kt-section--first">
								<div class="kt-wizard-v4__form">
									<div class="row">
										<div class="col-xl-12">
											<div class="kt-section__body">
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
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
												</div>	
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Title')}}</label>
													<div class="col-lg-9 col-xl-9">
														<input class="form-control" type="text" name="title"  value="{{ old('title') }}" class="form-control @error('name') is-invalid @enderror">
													
															@error('title')
															<p class="text-danger">{{ $message }}</p>
															@enderror
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Price')}}</label>
													<div class="col-lg-9 col-xl-9">
														<input class="form-control" type="text" name="price"  value="{{ old('price') }}" class="form-control @error('name') is-invalid @enderror">
													
															@error('price')
															<p class="text-danger">{{ $message }}</p>
															@enderror
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Discount')}}</label>
													<div class="col-lg-9 col-xl-9">
														<input class="form-control" type="text" name="discount"  value="{{ old('discount') }}" class="form-control @error('name') is-invalid @enderror">
													
															@error('discount')
															<p class="text-danger">{{ $message }}</p>
															@enderror
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Quantity')}}</label>
													<div class="col-lg-9 col-xl-9">
														<input class="form-control" type="text" name="quantity"  value="{{ old('quantity') }}" class="form-control @error('name') is-invalid @enderror">
													
															@error('quantity')
															<p class="text-danger">{{ $message }}</p>
															@enderror
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Department')}}</label>
													<div class="col-lg-9 col-xl-9">
													<select name="department_id" id="departments" class="form-control @error('department_id') is-invalid @enderror">
														<option>{{__('Select Department')}}</option>
														@foreach (App\Department::all() as $departments)
														<option value="{{ $departments->id }}" {{ $departments->id == old('department_id')? ' selected' : '' }}> {{ $departments->name }}</option>
														@endforeach
													</select>
													@error('department_id')
													<p class="text-danger">{{ $message }}</p>
													@enderror
													</div>
												</div>
											
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Part')}} </label>
													<div class="col-lg-9 col-xl-9">
													<select name="part_id" id="parts" class="form-control @error('part_id') is-invalid @enderror">
													<option>{{__('Select Part')}}</option>
													@if(old('department_id') && intval(old('department_id')) != 0 )
														@foreach (App\Department::find(old('department_id'))->parts as $parts)
														<option value="{{ $parts->id }}">{{ $parts->name }}</option>
														@endforeach
													@endif
														
													</select>
													@error('part_id')
													<p class="text-danger">{{ $message }}</p>
													@enderror
													</div>
												</div>

												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Size')}} </label>
													<div class="col-lg-9 col-xl-9">

													<select name="size" id="sizes" class="js-select2-multi form-control" multiple>
													<option>{{__('Select size')}}</option>
														@if(old('part_id') && intval(old('part_id')) != 0 )
														@foreach (App\Part::find(old('part_id'))->sizes as $sizes)
														<option value="{{ $sizes->id }}">{{ $sizes->name }}</option>
														@endforeach
														@endif
													</select>
													@error('size')
													<p class="text-danger">{{ $message }}</p>
													@enderror
													</div>
												</div>

												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Color')}} </label>
													<div class="col-lg-9 col-xl-9">
													@foreach (App\Color::all() as $color)
													<div class="form-ckeck form-check-inline" name="color" id="colors">
													@if(old('part_id') && intval(old('part_id')) != 0 )
														@foreach (App\Part::find(old('part_id'))->colors as $colors)
														
														@endforeach
														@endif
													</div>
													@endforeach
													@error('color')
													<p class="text-danger">{{ $message }}</p>
													@enderror
													</div>
												</div>

												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Company')}} </label>
													<div class="col-lg-9 col-xl-9">
													<select name="company_id" id="companies" class="form-control @error('company_id') is-invalid @enderror">
														<option>{{__('Select Company')}}</option>
														@foreach (App\Company::all() as $companies)
														<option value="{{ $companies->id }}" {{ $companies->id == old('company_id')? ' selected' : '' }}>{{ $companies->name }}</option>
														@endforeach
													</select>
													@error('company_id')
													<p class="text-danger">{{ $message }}</p>
													@enderror
													</div>
												</div>

												
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Manufacturer')}} </label>
													<div class="col-lg-9 col-xl-9">
													<select name="manfacturer_id" id="manfacturers" class="form-control @error('manfacturer_id') is-invalid @enderror">
														<option>{{__('Select Manufacturer')}}</option>
														@if(old('company_id') && intval(old('company_id')) != 0 )
															@foreach (App\Company::find(old('company_id'))->manufacturers as $manufacturers)
															<option value="{{ $manufacturers->id }}">{{ $manufacturers->name }}</option>
															@endforeach
														@endif
													</select>
													@error('manfacturer_id')
													<p class="text-danger">{{ $message }}</p>
													@enderror
													</div>
												</div>

												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('Brand')}} </label>
													<div class="col-lg-9 col-xl-9">
													<select name="brand_id" id="brands" class="form-control @error('brand_id') is-invalid @enderror">
														<option>{{__('Select Brand')}}</option>
														@if(old('manfacturer_id') && intval(old('manfacturer_id')) != 0 )
															@foreach (App\Manufacturer::find(old('manfacturer_id'))->brand as $brands)
															<option value="{{ $brands->id }}">{{ $brands->name }}</option>
															@endforeach
														@endif
														
													</select>
													@error('brand_id')
													<p class="text-danger">{{ $message }}</p>
													@enderror
													</div>
												</div>

												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">{{__('State')}} </label>
													<div class="col-lg-9 col-xl-9">
													<select name="state_id" id="state" class="form-control @error('state_id') is-invalid @enderror">
														<option>{{__('Select State')}}</option>
														@foreach (App\State::all() as $states)
														<option value="{{ $states->id }}">{{ $states->name }}</option>
														@endforeach
													</select>
													@error('state_id')
													<p class="text-danger">{{ $message }}</p>
													@enderror
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--end: Form Wizard Step 1-->

						<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
					</form>

					<!--end: Form Wizard Form-->
				</div>
			</div>
		</div>
	  </div>
	  </div>
    </div>

  </div>
</div>

@foreach(\App\Product::all() as $product)
<div id="show-product{{$product->id}}" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">{{__('Edit')}}  {{$product->title}}</h4>
				<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{ route('admin.products.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="kt-portlet__body">
						<div class="kt-widget kt-widget--user-profile-3">
							<div class="kt-widget__top">
								<div class="kt-widget__media kt-hidden-">
								<img src="{{ asset('storage/'. $product->img) }}"  alt="image"> 
								</div>
								<div class="kt-widget__content">
									<div class="kt-widget__head">
										<a href="#" class="kt-widget__username">
										{{ $product->title }}
											<i class="flaticon2-correct kt-font-success"></i>
										</a>
										
									</div>
									<div class="kt-widget__subhead">
										<a href="#"><i class="fa fa-donate"></i>{{ $product->price }}</a>
										<a href="#"><i class="fa fa-hand-holding-usd"></i>{{ $product->discount }}</a>
										<a href="#"><i class="fa fa-layer-group"></i>{{ $product->quantity }}</a>
									</div>
									<div class="kt-widget__info">
										<div class="kt-widget__desc">
										{{ $product->detail }}
										</div>
									</div>
								</div>
							</div>
							<div class="kt-widget__bottom">
							
								<div class="kt-widget__item">
										<i class="fa fa-palette"></i>
									<div class="kt-widget__details">
										<span class="kt-widget__title">{{__('Color')}}</span>
										<span class="kt-widget__value" style="color:{{ $color->name }};">
										@foreach($product->colors as $color)
												{{$color->name}}
												@if(!$loop->last)
												,
												@endif
										@endforeach
										</span>
									</div>
								</div>
								<div class="kt-widget__item">
										<i class="fa fa-star-half-alt"></i>
									
									<div class="kt-widget__details">
										<span class="kt-widget__title">{{__('size')}}</span>
										<span class="kt-widget__value">
										@foreach($product->sizes as $size)
											{{$size->name}}
											@if(!$loop->last)
											,
											@endif
										@endforeach
										</span>
									</div>
								</div>
								<div class="kt-widget__item">
										<i class="fa fa-layer-group"></i>
									<div class="kt-widget__details">
										<span class="kt-widget__title">{{__('Department')}}</span>
										<span class="kt-widget__value">{{$product->departments->name}}</span>
									</div>
								</div>
								<div class="kt-widget__item">
										<i class="fa fa-spa"></i>
									<div class="kt-widget__details">
										<span class="kt-widget__title">{{__('Part')}}</span>
										<span class="kt-widget__value">{{$product->parts->name}}</span>
									</div>
								</div>
							</div>
							<div class="kt-widget__bottom"> 
								<div class="kt-widget__item">
										<i class="fa fa-building"></i>
									<div class="kt-widget__details">
										<span class="kt-widget__title">{{__('Company')}}</span>
										<span class="kt-widget__value">{{$product->companies->name}}</span>
									</div>
								</div>
								<div class="kt-widget__item">
										<i class="fa fa-charging-station"></i>
									
									<div class="kt-widget__details">
										<span class="kt-widget__title">{{__('State')}}</span>
										<span class="kt-widget__value">{{$product->states->name}}</span>
									</div>
								</div>
								<div class="kt-widget__item">
										<i class="fa fa-chess-queen"></i>
									
									<div class="kt-widget__details">
										<span class="kt-widget__title">{{__('Manufacturer')}}</span>
										<span class="kt-widget__value">{{$product->manufacturers->name}}</span>
									</div>
								</div>
								<div class="kt-widget__item">
										<i class="fa fa-feather-alt"></i>
									
									<div class="kt-widget__details">
										<span class="kt-widget__title">{{__('Brand')}}</span>
										<span class="kt-widget__value">{{$product->brands->name}}</span>
									</div>
								</div>
							 
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endforeach

@endsection	


@push('js')
<script>
	$('#companies').on('change', function (e) {
		$('#manfacturers').empty();
		var companyId = $('#companies').val();
		if (!companyId) {
			return;
		}
		$.ajax({
				type: "GET",
				url: `/companies/${companyId}/manfacturers`,
				success: function(data) {
					$('#manfacturers').append('<option value=""></option>');
					$.each(data, function(i, manfacturer) {
					
						$('#manfacturers').append('<option value="' + manfacturer['id'] + '">' + manfacturer['name'] + '</option>');
					});
				}
			});
	});
	$('#manfacturers').on('change', function (e) {
		$('#brands').empty();
		var manfacturerId = $('#manfacturers').val();
		if (!manfacturerId) {
			return;
		}
		$.ajax({
				type: "GET",
				url: `/manfacturers/${manfacturerId}/brands`,
				success: function(data) {
					$.each(data, function(i, brand) {
						$('#brands').append('<option value="' + brand['id'] + '">' + brand['name'] + '</option>');
					});
				}
			});
	});
	$('#departments').on('change', function (e) {
		$('#parts').empty();
		var departmentId = $('#departments').val();
		if (!departmentId) {
			return;
		}
		$.ajax({
				type: "GET",
				url: `/departments/${departmentId}/parts`,
				success: function(data) {
					$.each(data, function(i, part) {
						$('#parts').append('<option value="' + part['id'] + '">' + part['name'] + '</option>');
					});
				}
			});
	});

	$('#parts').on('change', function (e) {
		$('#colors').empty();
		var partId = $('#parts').val();
		if (!partId) {
			return;
		}
		$.ajax({
				type: "GET",
				url: `/parts/${partId}/colors`,
				success: function(data) {
					$.each(data, function(i, color) {
						
						$('#colors').append('<input  class="form-check-input" type="checkbox" name="color[]" value="' + color['id'] + '">');
						$('#colors').append('<label class="form-check-label" style="color:' + color['name']  + ';">' + color['name']  + '</label>');
					});
				}
			});
	});

	$('#parts').on('change', function (e) {
		$('#sizes').empty()
		var partId = $('#parts').val();
		if (!partId) {
			return;
		}
		$.ajax({
				type: "GET",
				url: `/parts/${partId}/sizes`,
				success: function(data) {
					$.each(data, function(i, size) {
						$('#sizes').append('<option value="' + size['id'] + '">' + size['name'] + '</option>');
					});
				}
			});
	});

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

	$(".js-select2-multi").select2();

	@if ($errors->any())
	$('#add-product').modal('show');
	@endif
</script>
@endpush		
