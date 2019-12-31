@extends('layouts.admin')

@section('search')

<form method="get" action="{{ route('admin.admins.search') }}" class="form-inline">
	<input type="text" name="username" placeholder="Search Admin username..." class="form-control" value="{{ $username }}" style="display:inline;border: none;">
    <button type="submit" style=" background: none; border: none;padding: 0px;">
	<a class="fas fa-search" style="color:#fff" ></a></button>
   </form>
@endsection
@section('content')
<h2> {{ __('Admins')}} </h2>
<div class="kt-subheader__toolbar">
	<a href="#" class="">
	</a>
	<a data-toggle="modal" data-target="#add-admin" class="btn btn-label-brand btn-bold" style="color:#5d78ff;margin-bottom: 1%;">
	<i class="kt-menu__link-icon fa fa-user-lock fa-lg"></i>  {{__('Add Admin')}}
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
@foreach ($admins as $admin)
	<div class="col-xl-3">

		<!--Begin::Portlet-->
		<div class="kt-portlet kt-portlet--height-fluid">
			<div class="kt-portlet__head kt-portlet__head--noborder">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					 {{ $admin->id }}
				</div>
			
			</div>
			<div class="kt-portlet__body">

				<!--begin::Widget -->
				<div class="kt-widget kt-widget--user-profile-2">
					<div class="kt-widget__head">
						<div class="kt-widget__media">
						<img class="kt-widget__img kt-hidden-" src="{{ asset('storage/'. $admin->img) }}" alt="image" />
						</div>
						<div class="kt-widget__info">
							<a href="#" class="kt-widget__username">
							{{ $admin->username }}
							</a>
							<span class="kt-widget__desc">
							{{ $admin->name }}
							</span>
						</div>
					</div>
					<div class="kt-widget__body">
						
						<div class="kt-widget__item">
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('Email')}}:</span>
								<a href="#" class="kt-widget__data">{{ $admin->email }}</a>
							</div>
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('Phone')}}:</span>
								<a href="#" class="kt-widget__data">{{ $admin->phone }}</a>
							</div>
						</div>
					</div>
					<div class="kt-widget__footer">
					    <form  action="{{ route('admin.admins.edit', ['id' => $admin->id]) }}">
							@csrf
							<button type="submit" class="btn btn-label-brand btn-lg btn-upper"> 
							<i class="fas fa-plus-circle" style="padding-left: 3px;padding-right: 5px;"></i>
							</button>
						</form>

						<form method="post" action="{{ route('admin.admins.delete', ['id' => $admin->id]) }}">
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
<!-- Modal  Add-->
<div id="add-admin" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{__('Add New Admin')}}</h4>
		<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
      </div>
      <div class="modal-body">	
			<div class="kt-portlet">
				<div class="kt-portlet__body kt-portlet__body--fit">
					<div class="kt-grid">
						<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper" style="padding: 10px;">

							<!--begin: Form Wizard Form-->
							<form class="kt-form" method="post" action="{{ route('admin.admins.store') }}"  enctype="multipart/form-data" id="kt_apps_user_add_user_form" novalidate="novalidate">
							  @csrf
								<!--begin: Form Wizard Step 1-->
								<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
									<div class="kt-heading kt-heading--md"> {{__('Admins Profile Details:')}}</div>
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
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Name')}}</label>
															<div class="col-lg-9 col-xl-9">
																<input class="form-control" type="text" name="name"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
															
																	@error('name')
																	<p class="text-danger">{{ $message }}</p>
																	@enderror
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Username')}}</label>
															<div class="col-lg-9 col-xl-9">
															<input class="form-control" type="text" name="username"  value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror">
															
															@error('username')
															<p class="text-danger">{{ $message }}</p>
															@enderror
															</div>
														</div>
													
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Contact Phone')}}</label>
															<div class="col-lg-9 col-xl-9">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																	<input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" aria-describedby="basic-addon1">
																		@error('phone')
																		<p class="text-danger">{{ $message }}</p>
																		@enderror
																</div>
																<span class="form-text text-muted">We'll never share your email with anyone else.</span>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Email')}}</label>
															<div class="col-lg-9 col-xl-9">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
																	<input type="mail" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" aria-describedby="basic-addon1">
																		@error('email')
																		<p class="text-danger">{{ $message }}</p>
																		@enderror
																</div>
															</div>
														</div>
														<div class="form-group form-group-last row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Password')}}</label>
															<div class="col-lg-9 col-xl-9">
																<div class="input-group">
																	<input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" style=" width: auto;">
																		@error('password')
																		<p class="text-danger">{{ $message }}</p>
																		@enderror
																	<div class="input-group-append"><span class="input-group-text">secrt</span></div>
																</div>
															</div>
														</div>
														<div class="form-group form-group-last row">
															<label class="col-xl-3 col-lg-3 col-form-label">{{__('Permition')}}</label>
															<div class="col-lg-9 col-xl-9">
																<div class="input-group">
																	@foreach (App\Perm::all() as $perm)
																		<div class="form-ckeck form-check-inline">
																		<input class="form-check-input" type="checkbox" name="perm[]" value="{{$perm->name}}">
																			<label class="form-check-label">{{ $perm->name }}</label>
																		</div>
																	@endforeach
																</div>
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

<script>
$(document).ready(function(){

$('#kt_sweetalert_demo_3_3').click(function(e) {
		swal.fire("Good job!", "You Added  Was ", "success");
	});
});
</script>
@endsection	

@push('js')
	<script>
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
			else {}
		});
		@if ($errors->any())
			$('#add-admin').modal('show');
		@endif
	</script>
@endpush