@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Show Category</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Category</li>
			</ol>
			
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Show Category : {{ $category->nam }}
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<img src="{{asset('assets/uploads/categories/'.$category->image)}}" alt="{{$category->name}}" title="{{$category->name}}" width="100" height="100" style="border-radius: 50%; margin-left: 40%;">
						</div>
					</div>
					<div class="row row-col-2 mt-4">
						<div class="col"> <span>Name category : {{ $category->name }} </span> </div>
						<div class="col"> <span>Category : @if($category->parent->name) {{ $category->parent->name }} @else Không có @endif </span> </div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection