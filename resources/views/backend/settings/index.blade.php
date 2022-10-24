@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Settings</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Settings</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					@include('sweetalert::alert')
					<form method="post" action="{{route('setting.update', $setting->id)}}" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						<div class="form-group">
							<label class="col-form-label">Logo</label>
							<input type="file" class="form-control" name="logo">
							@if($setting->logo)
								<img src="{{asset('assets/uploads/settings/'.$setting->logo)}}" alt="{{$setting->title}}" width="100" height="100" class="mt-2">
							@endif
						</div>
						<div class="form-group mt-2">
							<label class="col-form-label">Favico</label>
							<input type="file" class="form-control" name="favico">
							@if($setting->logo)
								<img src="{{asset('assets/uploads/settings/'.$setting->favico)}}" alt="{{$setting->title}}" width="100" height="100" class="mt-2">
							@endif
						</div>
						<div class="form-group">
							<label class="col-form-label">Title</label>
							<input type="text" class="form-control" name="title" value=" {{$setting->title}} ">
							<span class="text-danger">{{ $errors->first('title') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" name="email" value=" {{$setting->email}} ">
						</div>
						<div class="form-group">
							<label class="col-form-label">Description</label>
							<textarea class="form-control" rows="5" cols="12" name="description">{!! $setting->description !!} </textarea>
						</div>
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input type="text" class="form-control" name="phone" value=" {{$setting->phone}} ">
						</div>
						<div class="form-group">
							<label class="col-form-label">Facebook</label>
							<input type="text" class="form-control" name="facebook" value=" {{$setting->facebook}} ">
						</div>
						<div class="form-group">
							<label class="col-form-label">Twitter</label>
							<input type="text" class="form-control" name="twitter" value=" {{$setting->twitter}} ">
						</div>
						<div class="form-group">
							<label class="col-form-label">Instagram</label>
							<input type="text" class="form-control" name="instagram" value=" {{$setting->instagram}} ">
						</div>
						<div class="form-group">
							<label class="col-form-label">Tik Tok</label>
							<input type="text" class="form-control" name="tiktok" value=" {{$setting->tiktok}} ">
						</div>
						<div class="form-group">
							<label class="col-form-label">Youtube</label>
							<input type="text" class="form-control" name="youtube" value=" {{$setting->youtube}} ">
						</div>
						<div class="form-group mt-4">
							<button class="btn btn-primary" type="submit" id="liveToastBtn" >Update Setting</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
@stop