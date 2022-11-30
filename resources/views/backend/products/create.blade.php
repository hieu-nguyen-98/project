@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Add Product</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Products</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
						@csrf
						@if($categories)
						<div class="form-group mt-2">
							<label class="col-form-label">Category</label>
							<select name="category_id" class="form-select">
								<option value="0" selected> ---Category--- </option>
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
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" name="name">
							<span class="text-danger">{{ $errors->first('name') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Image</label>
							<input type="file" class="form-control" multiple name="image[]" >
							<span class="text-danger">{{ $errors->first('image') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Price</label>
							<input type="text" name="price" class="form-control">
							<span class="text-danger">{{ $errors->first('price') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Discount Price</label>
							<input type="text" name="discount_price" class="form-control">
							<span class="text-danger">{{ $errors->first('discount_price') }}</span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Description</label>
							<textarea name="description" class="form-control"></textarea>
							<span class="text-danger">{{ $errors->first('description') }}</span>
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