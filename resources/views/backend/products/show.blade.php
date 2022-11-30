@php
$images = explode('|', $product->image)
@endphp
@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Show Product</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Product</li>
			</ol>
			
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Show Product : {{ $product->name }}
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							@foreach($images as $image)
							<img src="{{asset($image)}}" alt="{{$product->name}}" title="{{$product->name}}" width="100" height="100" style="border-radius: 50%; margin-left: 17%">
							@endforeach
						</div>
					</div>
					<div class="row row-col-2 mt-4">
						<div class="col"> <span>Name Product : {{ $product->name }} </span> </div>
						<div class="col"> <span>Category : {{ $product->category ? $product->category->name : null }} </span> </div>
					</div>
					<div class="row row-col-2 mt-4">
						<div class="col"> <span>Price : {{ number_format($product->price,2) }} </span> </div>
						<div class="col"> <span>Discount Price : {{ $product->discount_price }} </span> </div>
					</div>
					<div class="row row-col-2 mt-4">
						<div class="col"> <span>Description : {!! $product->description !!} </span> </div>
					</div>
					<div class="row row-col-2 mt-4">
						<div class="col"> <span>Created At : {{ $product->created_at->format('Y/m/d') }} </span> </div>
						<div class="col"> <span>Updated At : {{ $product->updated_at->format('Y/m/d') }} </span> </div>
					</div>
				</div>
			</div>
		</div>
	</main>
@stop