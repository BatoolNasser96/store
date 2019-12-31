@extends('layouts.admin')

@section('content')
<form  method="post" action="{{ route('admin.supplier.update', ['id' => $supplier->id]) }}" enctype="multipart/form-data" style="text-align: center; margin-top: 5%;">
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
		<h3 class="kt-section__title kt-section__title-sm">{{__('supplier Information:')}}</h3>
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
	<div class="col-lg-9 col-xl-6">
		<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
			<div class="kt-avatar__holder" style="background-image: url({{ asset('storage/'. $supplier->img) }});"></div>
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
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('username')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="text" name="username" value="{{ $supplier->username }}" class="form-control">
	@error('username')
		<p class="text-danger">{{ $message }}</p>
	@enderror
	</div>
</div>

<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Email')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="mail" name="email" value="{{ $supplier->email }}" class="form-control">
	@error('email')
		<p class="text-danger">{{ $message }}</p>
	@enderror
	</div>

</div>
<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Company')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
				<option>Select company</option>
				@foreach (App\Company::all() as $company)
				<option value="{{ $company->id }}" 
				{{old('company_id', $supplier->company_id)==$company->id ? 'selected' :' '}}
				>
				{{ $company->name }}</option>
				@endforeach
		</select>
			@error('company_id')
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