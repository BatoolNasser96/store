@extends('layouts.admin')

@section('content')
<h2>{{__('Edit User')}}</h2>
<form method="post" action="{{ route('admin.users.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="form-group">
		
		<label class="control-label">{{__('Username')}}</label>
		<div>
			<input type="text" name="username" value="{{ $user->username }}" class="form-control">
		</div>
		<label class="control-label">{{__('Email')}}</label>
		<div>
			<input type="text" name="email" value="{{ $user->email }}" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">{{__('Img')}}</label>
		<img src="{{ asset('storage/'. $user->img) }}" height="100">
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