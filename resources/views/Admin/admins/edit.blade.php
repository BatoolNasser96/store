@extends('layouts.admin')

@section('content')
	
<form  method="post" action="{{ route('admin.admins.update', ['id' => $admin->id]) }}" enctype="multipart/form-data" style="text-align: center; margin-top: 5%;">
@method('PUT')
@csrf
<div class="tab-content">
<div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
<div class="kt-form kt-form--label-right">
<div class="kt-form__body">
<div class="kt-section kt-section--first">
<div class="kt-section__body">
<div class="row">
	<label class="col-xl-3"></label>
	<div class="col-lg-9 col-xl-6">
		<h3 class="kt-section__title kt-section__title-sm">{{__('Admin Info:')}}</h3>
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
	<div class="col-lg-9 col-xl-6">
		<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
			<div class="kt-avatar__holder" style="background-image: url({{ asset('storage/'. $admin->img) }});"></div>
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
</div>


<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Name')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="text" name="name" value="{{ $admin->name }}" class="form-control">
	@error('name')
		<p class="text-danger">{{ $message }}</p>
	@enderror
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('username')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="text" name="username" value="{{ $admin->username }}" class="form-control">
	@error('username')
		<p class="text-danger">{{ $message }}</p>
	@enderror
	</div>
</div>

<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label"> {{__('Contact Phone')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
			<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
			<input type="text" name="phone" value="{{ $admin->phone }}" class="form-control" aria-describedby="basic-addon1">
			@error('phone')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
		<span class="form-text text-muted">We'll never share your email with anyone else.</span>
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Email')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="mail" name="email" value="{{ $admin->email }}" class="form-control">
	@error('email')
		<p class="text-danger">{{ $message }}</p>
	@enderror
	</div>
</div>
<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Perm')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		@foreach(App\Perm::all() as $Perm)
					<div class="form-ckeck form-check-inline">
					<input class="form-check-input" type="checkbox" name="perm[]" value="{{$Perm->name}}"
					{{in_array($Perm->id, $perms)? 'checked' :' '}}>
					<label class="form-check-label">{{ $Perm->name }}</label>
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
<button type="submit" class="btn btn-brand btn-bold" style="width:50%">{{__('Save')}}</button>
</form>
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

						// Not supported
						else {
							// fallback -- perhaps submit the input to an iframe and temporarily store
							// them on the server until the user's session ends.
						}
		});
	</script>
@endpush