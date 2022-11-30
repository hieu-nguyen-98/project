@extends('backend.layouts.master')
@section('content')
	
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Add User</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Users</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" name="name">
							<span class="text-danger">{{ $errors->first('name') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" name="email">
							<span class="text-danger">{{ $errors->first('email') }}</span>
						</div>
						<div class="form-group mt-2">
							<label class="col-form-label">Role</label>
							<select name="role" class="form-select">
								<option value="">---Role---</option>
								<option value="1" {{old('role') == 1 ? 'selected' : ''}} > Supper Admin </option>
								<option value="2" {{old('role') == 2 ? 'selected' : ''}} > Admin </option>
								<option value="3" {{old('role') == 3 ? 'selected' : ''}}> User </option>
								<option value="4" {{old('role') == 4 ? 'selected' : ''}}> Seller </option>
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="text" class="form-control" name="password">
							<span class="text-danger">{{ $errors->first('password') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Image</label>
							<input type="file" class="form-control" name="image" >
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