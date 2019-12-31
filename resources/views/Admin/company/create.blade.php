@extends('layouts.admin')
@section('content')
<h2>New Company</h2>

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif

<form method="post" action="{{ route('admin.company.store') }}" enctype="multipart/form-data" >
	@csrf
	<div class="form-group">
		<label class="control-label">{{__('Name')}}</label>
		<div>
			<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
			@error('name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">{{__('Country')}}</label>
		<div>
			<select name="country_id" class="form-control @error('country_id') is-invalid @enderror">
				<option>{{__('Select Country')}}</option>
				@foreach (App\Country::all() as $country)
				<option value="{{ $country->id }}">{{ $country->name }}</option>
				@endforeach
			</select>
			@error('country_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
    <div class="form-group">
		<label class="control-label">{{__('City')}}</label>
		<div>
			<select name="city_id" class="form-control @error('city_id') is-invalid @enderror">
				<option>{{__('Select City')}}</option>
				@foreach (App\City::all() as $city)
				<option value="{{ $city->id }}">{{ $city->name }}</option>
				@endforeach
			</select>
			@error('city_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">{{__('Detail Addres')}} </label>
		<div>
			<input type="text" name="detail_addres" value="{{ old('detail_addres') }}" class="form-control @error('detail_addres') is-invalid @enderror">
			@error('detail_addres')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label">{{__('Image')}}</label>
		<div>
			<input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
			@error('img')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
	
	
	<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
</form>

@endsection