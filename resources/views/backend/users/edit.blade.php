@extends('backend.layouts.master')
@section('content')
	
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Edit User</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Users</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<form method="post" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" name="name" value="{{$user->name}}">
							<span class="text-danger">{{ $errors->first('name') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" name="email" value="{{$user->email}}">
							<span class="text-danger">{{ $errors->first('email') }}</span>
						</div>
						<div class="form-group mt-2">
							<label class="col-form-label">Role</label>
							<select name="role" class="form-select">
								<option value="">---Role---</option>
								<option value="1" {{$user->role == 1 ? 'selected' : ''}} > Supper Admin </option>
								<option value="2" {{$user->role == 2 ? 'selected' : ''}} > Admin </option>
								<option value="3" {{$user->role == 3 ? 'selected' : ''}}> User </option>
								<option value="4" {{$user->role == 4 ? 'selected' : ''}}> Seller </option>
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="text" class="form-control" name="password" value="{{$user->password}}">
							<span class="text-danger">{{ $errors->first('password') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Image</label>
							<input type="file" class="form-control mb-2" name="image" >
							@if($user->image)
							<img src="{{asset('assets/uploads/users/'.$user->image)}}" width="100" height="100" alt="{{$user->name}}">
							@endif
							<span class="text-danger">{{ $errors->first('image') }}</span>
						</div>
						<div class="form-group mt-4">
							<button class="btn btn-danger" type="submit" >Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>

@stop