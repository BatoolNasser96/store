@extends('layouts.admin')


@section('content')


<h4>{{ $department->name }}</h4>


<form method="post" action="{{ route('admin.company.store') }}" enctype="multipart/form-data" >
	@csrf
	<div class="form-group">
		<label class="control-label">{{__('Title')}}</label>
		<div>
			<input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
			@error('title')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">{{__('Company')}}</label>
		<div>
			<select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
				<option>{{__('Select company')}}</option>
				@foreach (App\Company::all() as $company)
				<option value="{{ $company->id }}">{{ $company->name }}</option>
				@endforeach
			</select>
			@error('company_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
    <div class="form-group">
		<label class="control-label">{{__('part')}}</label>
		<div>
			<select name="part_id" class="form-control @error('part_id') is-invalid @enderror">
				<option>{{__('Select Part')}}</option>
				@foreach (App\Part::all() as $part)
				<option value="{{ $part->id }}">{{ $part->name }}</option>
				@endforeach
			</select>
			@error('part_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
    <div class="form-group">
		<label class="control-label">{{__('Product')}}</label>
		<div>
			<select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
				<option>{{__('Select Product')}}</option>
				@foreach (App\Product::all() as $product)
				<option value="{{ $product->id }}">{{ $product->name }}</option>
				@endforeach
			</select>
			@error('product_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">{{__('Content')}}</label>
		<div>
			<textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="6">{{ old('content') }}</textarea>
			@error('content')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">{{__('Image')}}</label>
		<div>
			<input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
			@error('image')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
	</div>
	
	
	<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
</form>



@endsection			