@extends('backend.layouts.master')
@section('content')
<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4">Add Attribute Product</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
			<li class="breadcrumb-item active">{{$attr->name}}</li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div id="example-1" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
							<div class="row">
								<div class="col-md-12">
									<button type="button" id="btnAdd-1" class="btn btn-primary">
										<i class="fas fa-plus-circle"></i>
									</button>
								</div>
							</div>
							<div class="row group" style="display: block;">
								<div class="col-md-6 mt-2">
									<label>Size</label>
									<input class="form-control" type="text">
								</div>
								<div class="col-md-6 mt-2">
									<label>Price</label>
									<input class="form-control" type="text">
								</div>
								<div class="col-md-6 mt-2">
									<label>Discount</label>
									<input class="form-control" type="text">
								</div>
								<div class="col-md-6 mt-2">
									<label>Color</label>
									<div class="input-color-container">
										<input class="input-color" value="#FF0000" type="color">
									</div>
								</div>
								<div class="col-md-6 mt-2">
									<button type="button" class="btn btn-danger btnRemove"><i class="fas fa-trash-alt"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery Multifield -->
<script src="{{asset('backend/js/jquery.multifield.min.js')}}"></script>
<script>
	$('#example-1').multifield();
</script>

<!-- Place this tag right after the last button or just before your close body tag. -->
<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
@endsection