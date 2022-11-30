@php
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
@endphp

@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Users List</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">User</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<a href="{{route('user.create')}}" class="btn btn-warning float-end">Create A User</a>
				</div>
			</div>
			@include('sweetalert::alert')
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Users List
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th>Loop</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $item)
							<tr>
								<td> {{ $loop->iteration }} </td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->email }}</td>
								<td>
									@if($item->role == UserRole::SUPPER_ADMIN)
										<span> Supper Admin </span>
									@elseif($item->role == UserRole::ADMIN)
										<span> Admin </span>
									@elseif($item->role == UserRole::USER)
										<span> User </span>
									@else
										<span> Seller </span>
									@endif
								</td>
								<td>
									<a href="{{route('user.show', $item->id)}}" title="view" class="btn btn-sm btn-outline-secondary "><i class="fas fa-eye"></i></a>
									<a href=" {{route('user.edit', $item->id)}} " class=" btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
									@if(Auth::user()->role == UserRole::SUPPER_ADMIN)
									<form class="btn-delete" action="{{ route('user.destroy', $item->id) }} " method="post" >
										@csrf
										@method('delete')
										<button class="dltBtn btn btn-sm btn-outline-danger "><i class="fas fa-trash-alt"></i></button>
									</form>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>
@endsection