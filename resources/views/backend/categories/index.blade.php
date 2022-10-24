@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Categories List</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
				<li class="breadcrumb-item active">Category</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<a href="{{route('category.create')}}" class="btn btn-warning float-end">Create A Category</a>
				</div>
			</div>
			@include('sweetalert::alert')
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Categories List
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th>Loop</th>
								<th>Title</th>
								<th>Image</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $item)
							<tr>
								<td> {{ $loop->iteration }} </td>
								<td>{{ $item->name }}</td>
								<td>
									<img src="{{asset('assets/uploads/categories/'.$item->image)}}" width="60" height="60">
								</td>
								<td>
									<a href=" {{route('category.edit', $item->id)}} " class=" float-left btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
									<form class="btn-delete" action="{{ route('category.destroy', $item->id) }} " method="post" >
										@csrf
										@method('delete')
										<button class="dltBtn btn btn-sm btn-outline-danger "><i class="fas fa-trash-alt"></i></button>
									</form>
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