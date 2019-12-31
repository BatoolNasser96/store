@extends('layouts.admin')


@section('content')
<h2> {{ __('Users')}} </h2>


<div class="table-toolbar mb-3">
<a data-toggle="modal" data-target="#add-user" style="margin-left: 25px;color: #cacad2;"> <i class="kt-menu__link-icon fa fa-users-cog fa-lg"></i></a>
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
			<th> {{ __('Username')}}</th>
			<th> {{ __('Email')}}</th>
			<th> {{ __('Updated At')}}</th>
			<th> {{ __('Actions')}}</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->updated_at  }}</td>
			<td>
				<a class="btn btn-info" href="{{ route('admin.users.edit', ['id' => $user->id]) }}"  style=" padding: 2px 3px;">
                   <i class="fas fa-plus" style="padding-left: 3px;padding-right: 5px;"   ></i>
                </a>
               
				<form method="post" action="{{ route('admin.users.delete', ['id' => $user->id]) }}" style="display: inline; ">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger" style=" padding: 2px 3px;"><i class="fas fa-minus"  style="padding-left: 3px;padding-right: 5px;"></i></button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div id="add-user" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Color</h4>
		<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
      </div>
      <div class="modal-body">
	  <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
			
				<label class="control-label">{{__('Username')}}</label>
				<div>
					<input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" style=" width: auto;">
					@error('username')
					<p class="text-danger">{{ $message }}</p>
					@enderror
				</div>
				<label class="control-label">{{__('Email')}}</label>
				<div>
					<input type="mail" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" style=" width: auto;">
					@error('email')
					<p class="text-danger">{{ $message }}</p>
					@enderror
				</div>
			
				<label class="control-label">{{__('Password')}}</label>
				<div>
					<input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" style=" width: auto;">
					@error('password')
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
@endsection	