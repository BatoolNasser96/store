@extends('layouts.admin')

@section('content')
<h2>{{__('Edit Color')}}</h2>
<form method="post" action="{{ route('admin.colors.update', ['id' => $color->id]) }}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="form-group">
		<label class="control-label">{{__('Name')}}</label>
		<div>
			<input type="text" name="name" value="{{ $color->name }}" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">{{__('Parts')}}</label>
		<div>
		   @foreach (App\Part::all() as $part)
              <div class="form-ckeck form-check-inline">
			  <input class="form-check-input" type="checkbox" name="part[]" value="{{$part->id}}"
			  {{in_array($part->id, $parts)? 'checked' :' '}}>
			  <label class="form-check-label">{{ $part->name }}</label>
			  </div>
			@endforeach
		</div>
	</div>
		<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
</form>

@endsection