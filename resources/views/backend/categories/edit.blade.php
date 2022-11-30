@php
use App\Models\Category;
@endphp
@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Edit Category</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Categories</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<form method="post" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data">
						@csrf
						@method('patch')
						<div class="form-group">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" name="name" value="{{$category->name}}">
							<span class="text-danger">{{ $errors->first('name') }}</span>
						</div>
						<div class="form-group mt-2">
							<label class="col-form-label">Parent Id</label>
							<select name="parent_id" class="form-select">
								@if($category->parent_id == Null)
								<option value="0" selected> {{ $category->name }} </option>
								@foreach($categories as $item)
									<option value="{{$item->id}}"> {{ ucfirst($item->name) }} </option>
									@if(count($item->childrenCategory))
										@include('backend.categories.child-category', ['childreanCategories' => $item->childrenCategory])
									@endif
								@endforeach
								@else
								<option value="{{$category->parent_id}}" selected > {{ $val_category }}  </option>
									@foreach($categories as $item)
										<option value="{{$item->id}}"> {{ ucfirst($item->name) }} </option>
										@if(count($item->childrenCategory))
											@include('backend.categories.child-category', ['childreanCategories' => $item->childrenCategory])
										@endif
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Image</label>
							<input type="file" class="form-control" name="image" >
							@if($category->image)
								<img src="{{asset('assets/uploads/categories/'.$category->image)}}" alt="{{$category->name}}" title="{{$category->name}}" width="100" height="100" class="mt-2">
							@endif
							<span class="text-danger">{{ $errors->first('image') }}</span>
						</div>
						<div class="form-group mt-4">
							<button class="btn btn-danger" type="submit" >Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
@stop