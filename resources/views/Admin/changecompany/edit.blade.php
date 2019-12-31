@extends('layouts.admin')

@section('content')
<form  method="post" action="{{ route('admin.changecompany.update', ['id' => $company->id]) }}" enctype="multipart/form-data" style="text-align: center; margin-top: 5%;">
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
		<h3 class="kt-section__title kt-section__title-sm">{{__('company Information:')}}</h3>
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
	<div class="col-lg-9 col-xl-6">
		<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
			<div class="kt-avatar__holder" style="background-image: url({{ asset('storage/'. $company->img) }});"></div>
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
	<input type="text" name="name" value="{{ $company->name }}" class="form-control">
	</div>
</div>

<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Detail_Addres')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="mail" name="detail_addres" value="{{ $company->detail_addres }}" class="form-control">
	</div>
</div>
<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Country')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="country_id" class="form-control @error('country_id') is-invalid @enderror">
				<option>{{__('Select Country')}}</option>
				@foreach (App\Country::all() as $country)
				<option value="{{ $country->id }}" 
				{{old('country_id', $company->country_id)==$country->id ? 'selected' :' '}}
				>
				{{ $country->name }}</option>
				@endforeach
			</select>
			@error('country_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>

</div>


<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('City')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="city_id" class="form-control @error('city_id') is-invalid @enderror">
				<option>{{__('Select City')}}</option>
				@foreach (App\city::all() as $city)
				<option value="{{ $city->id }}" 
				{{old('city_id', $company->city_id)==$city->id ? 'selected' :' '}}
				>
				{{ $city->name }}</option>
				@endforeach
			</select>
			@error('city_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>

</div>

<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Manufacturer')}} </label>
	<div class="col-lg-9 col-xl-6" style="padding-top: 10px;">
		<div class="input-group">
		@foreach (App\Manufacturer::all() as $manufacturer)
              <div class="form-ckeck form-check-inline">
			  <input class="form-check-input" type="checkbox" name="manufacturer[]" value="{{$manufacturer->id}}"
			  {{in_array($manufacturer->id, $manufacturers)? 'checked' :' '}}>
			  <label class="form-check-label">{{ $manufacturer->name }}</label>
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