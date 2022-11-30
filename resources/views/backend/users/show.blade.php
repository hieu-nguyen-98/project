@php
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
@endphp

@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Show User</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">User</li>
			</ol>
			
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Show User
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<img src="{{asset('assets/uploads/users/'.$user->image)}}" alt="{{$user->name}}" title="{{$user->name}}" width="100" height="100" style="border-radius: 50%; margin-left: 40%;">
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<p>Name : <span class="text-danger"> {{$user->name}} </span></p>
							<p>Email : <span class="text-danger"> {{$user->email}} </span></p>
							<p>Role : <span class="text-danger">
								@if($user->role == UserRole::SUPPER_ADMIN)
								Supper Admin
								@elseif($user->role == UserRole::ADMIN)
								Admin
								@elseif($user->role == UserRole::USER)
								User
								@else
								Seller
								@endif 
								</span>
							</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection