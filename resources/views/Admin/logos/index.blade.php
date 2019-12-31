@extends('layouts.admin')


@section('content')
<h2> {{ __('Setting')}} </h2>


<div class="table-toolbar mb-3">

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
	<div class="col-xl-3">

		<!--Begin::Portlet-->
		<div class="kt-portlet kt-portlet--height-fluid">
			<div class="kt-portlet__head kt-portlet__head--noborder">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
				{{ $logos->id  }}
				</div>
			
			</div>
			<div class="kt-portlet__body">

				<!--begin::Widget -->
				<div class="kt-widget kt-widget--user-profile-2">
					<div class="kt-widget__head">
						<div class="kt-widget__media">
						<img class="kt-widget__img kt-hidden-" src="{{ asset('storage/'. $logos->logo) }}" alt="image">
						</div>
						
					</div>
					<div class="kt-widget__body">
						
						<div class="kt-widget__item">
						<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('Name:')}}</span>
								<a href="#" class="kt-widget__data">{{ $logos->name  }}</a>
							</div>
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('Email:')}}</span>
								<a href="#" class="kt-widget__data">{{ $logos->email  }}</a>
							</div>
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('Tel-Fax:')}}</span>
								<a href="#" class="kt-widget__data">{{ $logos->Tfax  }}</a>
							</div>
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('Phone:')}}</span>
								<a href="#" class="kt-widget__data">{{ $logos->phone  }}</a>
							</div>
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('Currency:')}}</span>
								<a href="#" class="kt-widget__data">{{ $logos->currency  }}</a>
							</div>
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('created:')}}</span>
								<a href="#" class="kt-widget__data">{{ $logos->created_at  }}</a>
							</div>
							<div class="kt-widget__contact">
								<span class="kt-widget__label">{{__('updated:')}}</span>
								<a href="#" class="kt-widget__data">{{ $logos->updated_at  }}</a>
							</div>
							<div class="kt-widget__contact">
								<a href="#" class="kt-widget__data">{{ $logos->description  }}</a>
							</div>
						</div>
					</div>
					<div class="kt-widget__footer">
					    <a data-toggle="modal" data-target="#edit-logo{{$logos->id}}">
							<button type="submit" class="btn btn-label-brand btn-lg btn-upper"> 
							<i class="fas fa-plus-circle" style="padding-left: 3px;padding-right: 5px;"></i>
							</button>
						</a>
					</div>
				</div>
               
				<!--end::Widget -->
			</div>
		</div>

		<!--End::Portlet-->
	</div>
						
</div>

@foreach(\App\Logo::all() as $logos)
		<div id="edit-logo{{$logos->id}}" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{__('Edit logo Setting')}}</h4>
					<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
				</div>
				<div class="modal-body">
				<form method="post" action="{{ route('admin.logos.update', ['id' => $logos->id]) }}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					
				
					<div class="col-lg-9 col-xl-6">
						<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
							<div class="kt-avatar__holder" style="background-image: url({{ asset('storage/'. $logos->logo) }});"></div>
							<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
								<i class="fa fa-pen" style="margin-left: 24px;"></i>
								<input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror"  accept=".png, .jpg, .jpeg">
							@error('logo')
							<p class="text-danger">{{ $message }}</p>
							@enderror
							</label>
							<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
								<i class="fa fa-times"></i>
							</span>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">{{__('Name')}}</label>
						<div class="col-lg-9 col-xl-6">
						<input type="text" name="name" value="{{ $logos->name }}" class="form-control @error('name') is-invalid @enderror">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">{{__('Email')}}</label>
						<div class="col-lg-9 col-xl-6">
						<input type="mail" name="email" value="{{ $logos->email }}" class="form-control @error('email') is-invalid @enderror">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label"> {{__('Contact Phone')}}</label>
						<div class="col-lg-9 col-xl-6">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
								<input type="text" name="phone" value="{{ $logos->phone }}" class="form-control @error('phone') is-invalid @enderror" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label"> {{__('Contact Tell-Fax')}}</label>
						<div class="col-lg-9 col-xl-6">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
								<input type="text" name="Tfax" value="{{ $logos->Tfax }}" class="form-control @error('Tfax') is-invalid @enderror" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">{{__('Currency')}}</label>
						<div class="col-lg-9 col-xl-6">
						<input type="text" name="currency" value="{{ $logos->currency }}" class="form-control @error('currancy') is-invalid @enderror">
						</div>
					</div>


					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">{{__('Description')}}</label>
						<div class="col-lg-9 col-xl-6">
						<input type="text" name="description" value="{{ $logos->description }}" class="form-control @error('description') is-invalid @enderror">
						</div>
					</div>
					
					<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
				</form>
				</div>
				</div>

			</div>
		</div>
		@endforeach
@endsection	


@push('js')
	<script>
		$('.kt-avatar__upload input[name=logo]').change(function (evt) {
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
	</script>
@endpush