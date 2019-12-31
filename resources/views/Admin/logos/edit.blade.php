@extends('layouts.admin')

@section('content')
<h2>{{__('Edit Logo')}}</h2>
<form method="post" action="{{ route('admin.logos.update', ['id' => $logos->id]) }}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	
	<div class="form-group">
		<label class="control-label">{{ __('logo')}}</label>
		<img src="{{ asset('storage/'. $logos->logo) }}" height="100">
		<div>
			<input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
			@error('logo')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>

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
	<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
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