@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Products List</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
				<li class="breadcrumb-item active">Product</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<a href="{{route('product.create')}}" class="btn btn-warning float-end">Create Product</a>
				</div>
			</div>
			@include('sweetalert::alert')
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Products List
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th>Loop</th>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $item)
							<tr>
								<td> {{ $loop->iteration }} </td>
								<td>
									@php
									$image = explode('|', $item->image)
									@endphp
									<img src="{{asset($image[0])}}" width="60" height="60">
								</td>
								<td> {{$item->name}} </td>
								<td> {{number_format($item->price,3)}} </td>

								<td>
									<a href="{{route('product.attribute', $item->id)}}" title="atrribute" class="btn btn-sm btn-outline-success "><i class="fas fa-plus"></i></a>
									<a href="{{route('product.show', $item->id)}}" title="view" class="btn btn-sm btn-outline-secondary "><i class="fas fa-eye"></i></a>
									<a href=" {{route('product.edit', $item->id)}} " class=" float-left btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
									<form class="btn-delete" action="{{ route('product.destroy', $item->id) }} " method="post" >
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