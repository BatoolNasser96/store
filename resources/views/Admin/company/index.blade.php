@extends('layouts.admin')


@section('content')
<div class="col-lg-12  order-lg-1 order-xl-1" style="top:30px;">
<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
		<div class="kt-portlet__head-label" style=" display:block;">
			<h3 class="kt-portlet__head-title" style="color:#a3a3a9;">
			  <i class="kt-menu__link-icon fas fa-building fa-lg"></i> {{ $company->name }}    
			</h3>
	</div>
	
</div>
<!--begin:: Widgets/Activity-->
<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
	<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x" style="min-height:30px;height: 30px;">
		<div class="kt-portlet__head-label" style=" display:block;">
			<h5 class="kt-portlet__head-title" style="font-size: 12px; color:#a3a3a9; padding-top:13px;">{{ $company->detail_addres }}/
			<span>{{ $company->cities->name }}/</span>
			<span>{{ $company->countries->name }} </span>
			</h5>
		</div>
		
	</div>
	<div class="kt-portlet__body kt-portlet__body--fit">
		<div class="kt-widget17">
			<div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" >
				<div class="kt-widget17__chart" style="height:320px; text-align: center;">
					<img src="{{ asset('storage/'. $company->img) }}" alt="" style="max-width: 22%;height: 71%;margin-top: -25px;" />
				</div>
			</div>
			<div class="kt-widget17__stats" style="border-top: 1px solid #a3a3a9;">
			
				<div class="kt-widget17__items">
				@foreach($company->suppliers as $com)
					<div class="kt-widget17__item col-lg-6">
						<span class="kt-widget17__icon">
						<img src="{{ asset('storage/'. $com->img) }}" alt="" style="height: 50px;" />
						</span>
						<span class="kt-widget17__subtitle">
						  {{ $com->username }}
						</span>
						<span class="kt-widget17__desc">
						{{ $com->email }}
						</span>
					</div>

					
				@endforeach
				</div>
			
			</div>
		</div>
	</div>
</div>

<!--end:: Widgets/Activity-->
</div>

<div class="kt-portlet kt-portlet--height-fluid" style="margin-top:50px;">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				{{ __('All Product')}}
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
			<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
						{{__('General')}}
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
						{{__('Create')}}
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="tab-content">
			<div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
				<div class="kt-widget5">
				
				@foreach($company->product as $pro)
					<div class="kt-widget5__item">
						<div class="kt-widget5__content">
							<div class="kt-widget5__pic">
							
							<img src="{{ asset('storage/'. $pro->img) }}" alt="" />
							</div>
							
							<div class="kt-widget5__section">
								<a href="#" class="kt-widget5__title">
								{{ $pro->title }}
								</a>
							<a class="btn btn-info" href="{{ route('admin.products.edit', ['id' => $pro->id]) }}"  style=" padding: 2px 3px;">
								<i class="fas fa-plus" style="padding-left: 3px;padding-right: 5px;"   ></i>
							</a>
							
							<form method="post" action="{{ route('admin.products.delete', ['id' => $pro->id]) }}" style="display: inline; ">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger" style=" padding: 2px 3px;">
								<i class="fas fa-minus"  style="padding-left: 3px;padding-right: 5px;">
								</i></button>
							</form>

								<p class="kt-widget5__desc">
								{{ $pro->detail }}
								</p>
								<div class="kt-widget5__info">
									<span>Department:</span>
									<span class="kt-font-info">{{ $pro->departments->name }}</span>
									<span>Manufacturer:</span>
									<span class="kt-font-info">{{ $pro->manufacturers->name }}</span>
								</div>
							</div>
						</div>
						<div class="kt-widget5__content">
							<div class="kt-widget5__stats">
								<span class="kt-widget5__number" style="text-decoration: line-through;color: #5555;">{{ $pro->price }}</span>
								<span class="kt-widget5__sales" style="text-decoration: line-through;color: #5555;">$</span>
							</div>
							<div class="kt-widget5__stats">
								<span class="kt-widget5__number">{{ $pro->discount }}</span>
								<span class="kt-widget5__votes">$</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane" id="kt_widget5_tab2_content">
			<div class="kt-portlet">
				<div class="kt-portlet__body kt-portlet__body--fit">
					<div class="kt-grid">
						<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper" style="padding: 10px;">

							<!--begin: Form Wizard Form-->
							<form class="kt-form" method="post" action="{{ route('admin.products.store') }}"  enctype="multipart/form-data" id="kt_apps_user_add_user_form" novalidate="novalidate">
							@csrf
								<!--begin: Form Wizard Step 1-->
								<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
									<div class="kt-heading kt-heading--md">{{__('Product Details:')}}</div>
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
																<option value="{{ $departments->id }}">{{ $departments->name }}</option>
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
																<option value=""></option>
																
															</select>
															@error('part_id')
															<p class="text-danger">{{ $message }}</p>
															@enderror
															</div>
														</div>

														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Size')}} </label>
															<div class="col-lg-9 col-xl-9">
															@foreach (App\Size::all() as $size)
															<div class="form-ckeck form-check-inline">
															<input class="form-check-input" type="checkbox" name="size[]" value="{{$size->id}}">
															<label class="form-check-label">{{ $size->name }}</label>
															</div>
															@endforeach
															</div>
														</div>

														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Color')}} </label>
															<div class="col-lg-9 col-xl-9">
															@foreach (App\Color::all() as $color)
															<div class="form-ckeck form-check-inline">
															<input class="form-check-input" type="checkbox" name="color[]" value="{{$color->id}}">
															<label class="form-check-label">{{ $color->name }}</label>
															</div>
															@endforeach
															</div>
														</div>

														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Company')}} </label>
															<div class="col-lg-9 col-xl-9">
															<select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
																<option>{{__('Select Company')}}</option>
																@foreach (App\Company::all() as $companies)
																<option value="{{ $companies->id }}">{{ $companies->name }}</option>
																@endforeach
															</select>
															@error('company_id')
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
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Manufacturer')}} </label>
															<div class="col-lg-9 col-xl-9">
															<select name="manfacturer_id" id="manfacturers" class="form-control @error('manfacturer_id') is-invalid @enderror">
																<option>{{__('Select Manufacturer')}}</option>
																@foreach (App\Manufacturer::all() as $manufacturers)
																<option value="{{ $manufacturers->id }}">{{ $manufacturers->name }}</option>
																@endforeach
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
																<option value=""></option>
																
															</select>
															@error('brand_id')
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




@endsection			