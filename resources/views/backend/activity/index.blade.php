@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Activity History</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
				<li class="breadcrumb-item active">Activity History</li>
			</ol>
			@include('sweetalert::alert')
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Activity History
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th>Loop</th>
								<th>Name</th>
								<th>Description</th>
								<th>Value Change</th>
								<th>Time</th>
							</tr>
						</thead>
						<tbody>
							@foreach($activity as $item)
							<tr>
								<td> {{ $loop->iteration }} </td>
								<td>{{ $item->log_name }}</td>
								<td>{!! $item->description !!}</td>
								<td> {!! $item->properties !!} </td>
								<td>{{ $item->created_at }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>
@endsection