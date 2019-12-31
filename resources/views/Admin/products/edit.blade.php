@extends('layouts.admin')

@section('content')

<form  method="post" action="{{ route('admin.products.update', ['id' => $product->id]) }}" enctype="multipart/form-data" style="text-align: center; margin-top: 5%;">
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
		<h3 class="kt-section__title kt-section__title-sm">{{__('Product Information:')}}</h3>
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
	<div class="col-lg-9 col-xl-6">
		<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
			<div class="kt-avatar__holder" style="background-image: url({{ asset('storage/'. $product->img) }});"></div>
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
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Title')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="text" name="title" value="{{ $product->title }}" class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Detail')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="text" name="detail" value="{{ $product->detail }}" class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Price')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="text" name="price" value="{{ $product->price }}" class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Discount')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="text" name="discount" value="{{ $product->discount }}" class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Quantity')}}</label>
	<div class="col-lg-9 col-xl-6">
	<input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control">
	</div>
</div>

<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Size')}} </label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="size"  class="js-select2-multi form-control" multiple>
			@foreach (App\Size::all() as $size)
			<option name="size[]" value="{{$size->id}}">{{ $size->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
</div>
<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Color')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="color"  class="js-select2-multi form-control" multiple>
			@foreach (App\Color::all() as $color)
			<option name="color[]" value="{{$color->id}}">{{ $color->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
</div>


<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Department')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="department_id" class="form-control @error('department_id') is-invalid @enderror">
			
			@foreach (App\Department::all() as $department)
			<option value="{{ $department->id }}" 
			{{ (old("department_id",$product->department_id) == $department->id ? "selected" :"") }}>
			{{ $department->name }}
			</option>
			@endforeach
		</select>
		@error('department_id')
		<p class="text-danger">{{ $message }}</p>
		@enderror
		</div>
	</div>

</div>

<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Part')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="part_id" class="form-control @error('part_id') is-invalid @enderror">
			
			@foreach (App\Part::all() as $part)
			<option value="{{ $part->id }}" 
			{{ (old("part_id",$product->part_id) == $part->id ? "selected" :"") }}>
			{{ $part->name }}
			</option>
			@endforeach
		</select>
		@error('part_id')
		<p class="text-danger">{{ $message }}</p>
		@enderror
		</div>
	</div>

</div>

<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Company')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
				<option>{{__('Select company')}}</option>
				@foreach (App\Company::all() as $company)
				<option value="{{ $company->id }}" 
				{{old('company_id', $product->company_id)==$company->id ? 'selected' :' '}}
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

<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('State')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="state_id" class="form-control @error('state_id') is-invalid @enderror">
				<option>{{__('Select State')}}</option>
				@foreach (App\State::all() as $State)
				<option value="{{ $State->id }}" 
				{{old('state_id', $product->state_id)==$State->id ? 'selected' :' '}}
				>
				{{ $State->name }}</option>
				@endforeach
			</select>
			@error('state_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>

</div>

<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Manufacturer')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="manfacturer_id" class="form-control @error('manfacturer_id') is-invalid @enderror">
				<option>{{__('Select Manufacturer')}}</option>
				@foreach (App\Manufacturer::all() as $manufacturer)
				<option value="{{ $manufacturer->id }}" 
				{{old('manfacturer_id', $product->manfacturer_id)==$manufacturer->id ? 'selected' :' '}}
				>
				{{ $manufacturer->name }}</option>
				@endforeach
			</select>
			@error('manufacturer_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>

</div>


<div class="form-group form-group-last row">
	<label class="col-xl-3 col-lg-3 col-form-label">{{__('Brand')}}</label>
	<div class="col-lg-9 col-xl-6">
		<div class="input-group">
		<select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
				<option>{{__('Select Brand')}}</option>
				@foreach (App\Brand::all() as $brand)
				<option value="{{ $brand->id }}" 
				{{old('brand_id', $product->brand_id)==$brand->id ? 'selected' :' '}}
				>
				{{ $brand->name }}</option>
				@endforeach
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

		$(".js-select2-multi").select2();

	</script>
@endpush