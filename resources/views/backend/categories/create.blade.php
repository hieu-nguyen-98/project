@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Add Category</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Categories</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" name="name">
							<span class="text-danger">{{ $errors->first('name') }}</span>
						</div>
						@if($categories)
						<div class="form-group mt-2">
							<label class="col-form-label">Parent Id</label>
							<select name="parent_id" class="form-select">
								<option value="0" selected> ---Subcategory--- </option>
								@foreach($categories as $item)
									<option value="{{$item->id}}"> {{ ucfirst($item->name) }} </option>
									@if(count($item->childrenCategory))
										@include('backend.categories.child-category', ['childreanCategories' => $item->childrenCategory])
									@endif
								@endforeach
							</select>
						</div>
						@endif
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