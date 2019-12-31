@extends('layouts.admin')

@section('search')

<form method="get" action="{{ route('admin.manufacturers.search') }}" class="form-inline">
	<input type="text" name="name" placeholder="Search Manufacturer Name..." class="form-control" value="{{ $name }}" style="display:inline;border: none;    width: 100%;">
    <button type="submit" style=" background: none; border: none;padding: 0px;">
	<a class="fas fa-search" style="color:#fff" ></a></button>
   </form>
@endsection
@section('content')
<h2> {{ __('Manufactours')}} </h2>
<a style="margin-left: 10px;margin-right: 10px;color: #cacad2;" data-toggle="modal" data-target="#add-manufacturer"> 
<i class="kt-menu__link-icon fa fa-plus-square fa-lg">'
</i>
</a>


<div class="table-toolbar mb-3">

</div>

@if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
@endif


@if (session('error'))
	@component('components.alert')
		@slot('type', 'danger')
	 	{{ session('error') }}
	@endcomponent
@endif

<table class="table" style="background:#fff;">
	<thead>
		<tr>
			<th> {{ __('ID')}}</th>
			<th> {{ __('Manufactour')}}</th>
			<th> {{ __('Email')}}</th>
			<th> {{ __('Edit')}}</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($manufacturers as $manufacturer)
		<tr>
			<td>{{ $manufacturer->id }}</td>
            <td>{{ $manufacturer->name  }}</td>
			<td>{{ $manufacturer->email  }}</td>
			<td>
				<a class="btn btn-info" data-toggle="modal" data-target="#edit-manufacturer{{$manufacturer->id}}"  style=" padding: 2px 3px;">
                   <i class="fas fa-plus" style="padding-left: 3px;padding-right: 5px;"   ></i>
                </a>
               
				<form method="post" action="{{ route('admin.manufacturers.delete', ['id' => $manufacturer->id]) }}" style="display: inline; ">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger" style=" padding: 2px 3px;"><i class="fas fa-minus"  style="padding-left: 3px;padding-right: 5px;"></i></button>
				</form>
			</td>
			</tr>
			@endforeach
		
	</tbody>
</table>

<div id="add-manufacturer" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">{{__('Add New Manufacturer')}}</h4>
			<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
		</div>
		<div class="modal-body">
				<form method="post" action="{{ route('admin.manufacturers.store') }}" enctype="multipart/form-data" >
				@csrf
				<div class="form-group">
					<label class="control-label">{{ __('Name')}}</label>
					<div>
						<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
						@error('name')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
				</div>

				<div class="form-group">
					<label class="control-label">{{__('Email')}}</label>
					<div>
						<input type="mail" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" style=" width: auto;">
						@error('email')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
				</div>
			
				<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
				</form>
		</div>
		</div>

	</div>
</div>


	@foreach(\App\Manufacturer::all() as $manufacturer)
			<div id="edit-manufacturer{{$manufacturer->id}}" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit {{ $manufacturer->name }}</h4>
						<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
					</div>
					<div class="modal-body">
					<form method="post" action="{{ route('admin.manufacturers.update', ['id' => $manufacturer->id]) }}" enctype="multipart/form-data">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label class="control-label">{{__('Name')}}</label>
							<div>
								<input type="text" name="name" value="{{ $manufacturer->name }}" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label">{{__('Email')}}</label>
							<div>
								<input type="mail" name="email" value="{{ $manufacturer->email }}" class="form-control">
							</div>
						</div>
							<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
					</form>
					</div>
					</div>

				</div>
			</div>
	@endforeach
@endsection	
@push('js')
<script>
	@if ($errors->any())
	$('#add-manufacturer').modal('show');
	@endif
	@if ($errors->any())
	$('#edit-manufacturer').modal('show');
	@endif
</script>
@endpush