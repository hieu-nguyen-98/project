@extends('backend.layouts.master')
@section('content')
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Create Attribute Product</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"> <a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Products</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Name Attr</label>
							<select class="form-select" name="" id="inputName">
								<option value="color">Color</option>
								<option value="size">Size</option>
							</select>
						</div>
						<div class="form-group value1">
							<label class="col-form-label">Color</label>
							<input type="color" name="" class="form-control">
						</div>
						<div class="form-group value2" style="display: none;">
							<label class="col-form-label">Size</label>
							<input type="text" name="" class="form-control">
						</div>
						<div class="form-group mt-4">
							<button class="btn btn-danger" type="submit" >Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
	$('#inputName').change(function(event) {
		var ip = $('#inputName').val();
		if(ip == 'size'){
			$('.value2').show();
			$('.value1').hide();
		}else{
			$('.value2').hide();
			$('.value1').show();
		}
	})
</script>
@stop
