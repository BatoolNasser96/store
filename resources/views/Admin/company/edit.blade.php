@extends('layouts.admin')

@section('content')
<h2>{{__('Edit Company')}}</h2>
<form method="post" action="{{ route('admin.companies.update', ['id' => $company->id]) }}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="form-group">
		<label class="control-label">{{__('Name')}}</label>
		<div>
			<input type="text" name="name" value="{{ $company->name }}" class="form-control">
		</div>
		<label class="control-label">{{__('Detail_Addres')}}</label>
		<div>
			<input type="text" name="detail_addres" value="{{ $company->detail_addres }}" class="form-control">
		</div>
		
	</div>
	
	<div class="form-group">
		<label class="control-label">{{__('Country')}}</label>
		<div>
			<select name="country_id" class="form-control @error('country_id') is-invalid @enderror">
				<option>{{__('Select Country')}}</option>
				@foreach (App\Country::all() as $country)
				<option value="{{ $country->id }}" 
				{{old('country_id', $post->country_id)==$country->id ? 'selected' :' '}}
				>
				{{ $country->name }}</option>
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
				@foreach (App\city::all() as $city)
				<option value="{{ $city->id }}" 
				{{old('city_id', $post->city_id)==$city->id ? 'selected' :' '}}
				>
				{{ $city->name }}</option>
				@endforeach
			</select>
			@error('city_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
    <div class="form-group">
		<label class="control-label">{{__('Brand')}}</label>
		<img src="{{ asset('storage/'. $companty->img) }}" height="100">
		<div>
			<input type="file" name="image" class="form-control @error('img') is-invalid @enderror">
			@error('img')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
</form>

@endsection