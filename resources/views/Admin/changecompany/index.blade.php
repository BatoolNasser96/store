@extends('layouts.admin')
@section('search')

<form method="get" action="{{ route('admin.changecompany.search') }}" class="form-inline">
	<input type="text" name="name" placeholder="Search Supplier name..." class="form-control" value="{{ $name }}" style="display:inline;border: none; width:100%">

	<select name="country_id" class="form-control ml-1" style="width: 89%;">
		<option value="">All companies </option>
		@foreach (App\Country::all() as $country)								
		<option value="{{ $country->id }}"{{ $country_id == $country->id? ' selected' : '' }}>{{ $country->name }}</option>
		@endforeach
	</select>
	<button type="submit" style="height: 40px;">
	<i class="flaticon2-search-1" style="color:#000" ></i></button>
	<select name="city_id" class="form-control ml-1" style="width: 89%;">
		<option value="">All city </option>
		@foreach (App\City::all() as $city)								
		<option value="{{ $city->id }}"{{ $city_id == $city->id? ' selected' : '' }}>{{ $city->name }}</option>
		@endforeach
	</select>
	<button type="submit" style="height: 40px;">
	<i class="flaticon2-search-1" style="color:#000" ></i></button>
   </form>
@endsection

@section('content')
<h2> {{ __('Change Company')}} </h2>
<div class="kt-subheader__toolbar">
	<a href="#" class="">
	</a>
	<a data-toggle="modal" data-target="#add-company" class="btn btn-label-brand btn-bold" style="color:#5d78ff;margin-bottom: 1%;">
	<i class="kt-menu__link-icon fa fa-building fa-lg"></i> Add company 
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
@foreach ($company as $companies)							
	<div class="col-xl-3">
		<div class="kt-portlet kt-portlet--height-fluid">
			<div class="kt-portlet__head kt-portlet__head--noborder">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					 {{ $companies->id }}
				</div>
			</div>
			<div class="kt-portlet__body kt-portlet__body--fit-y kt-margin-b-40">

				<!--begin::Widget -->
				<div class="kt-widget kt-widget--user-profile-4">
					<div class="kt-widget__head">
						<div class="kt-widget__media">
							<img class="kt-widget__img kt-hidden-" src="{{ asset('storage/'. $companies->img) }}" alt="image">
							<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-hidden">
								AP
							</div>
						</div>
						<div class="kt-widget__content">
							<div class="kt-widget__section">
								<a href="#" class="kt-widget__username">
								{{ $companies->countries->name }} /{{ $companies->cities->name }} / {{ $companies->detail_addres }}
									
								</a>
								<div class="kt-widget__button">
									<span class="btn btn-label-brand btn-sm">{{ $companies->name }}</span>
								</div>

								
								<div class="kt-widget__item text-center">
									<div class="kt-widget__contact">
										<span class="kt-widget__label">{{__('manufacturer:')}}</span>
										<a href="#" class="kt-widget__data">	
											@foreach($companies->manufacturers as $manufacturer)
												{{$manufacturer->name}}
												@if(!$loop->last)
												,
												@endif
											@endforeach
										</a>
									</div>
								</div>
								
								<div class="kt-widget__action">
								<form  action="{{ route('admin.changecompany.edit', ['id' => $companies->id]) }}">
									@csrf
									<button type="submit" class="btn btn-label-brand btn-lg btn-bold btn-sm btn-upper"> 
									<i class="fas fa-plus-circle" style="padding-left: 3px;padding-right: 5px;"></i>
									</button>
								</form>

								<form method="post" action="{{ route('admin.changecompany.delete', ['id' => $companies->id]) }}">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-label-danger btn-bold btn-sm btn-upper">
									<i class="fas fa-times-circle"  style="padding-left: 3px;padding-right: 5px;"></i>
									</button>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--end::Widget -->
			</div>
		</div>
	</div>
@endforeach
</div>
<div id="add-company" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{__('Add New Company')}}</h4>
		<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
      </div>
      <div class="modal-body">
		
		<div class="kt-portlet">
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
@endsection

@push('js')
<script>
$(document).ready(function(){

$('#kt_sweetalert_demo_3_3').click(function(e) {
		swal.fire("Good job!", "You Added  Was ", "success");
	});
});
$('#countries').on('change', function (e) {
	$('#cities').empty()
	var countryId = $(this).val();
	if (!countryId) {
		return;
	}
	$.ajax({
			type: "GET",
			url: `/countries/${countryId}/cities`,
			success: function(data) {
				$.each(data, function(i, city) {
					$('#cities').append('<option value="' + city.id + '">' + city.name + '</option>');
				});
			}
		});
});
var tgt = evt.target || window.event.srcElement,files = tgt.files;
	if (FileReader && files && files.length) {
		var fr = new FileReader();
		fr.onload = function () {
			$('.kt-avatar__holder').css('background-image', `url(${fr.result})`);
		}
		fr.readAsDataURL(files[0]);
	}
	else {}
});

@if ($errors->any())
$('#add-company').modal('show');
@endif
</script>
@endpush


		