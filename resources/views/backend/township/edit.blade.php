@extends('backend/backend_template')

@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Blank Page</h1>
			<p>Start a beautiful journey here</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="{{route('deliver.index')}}">Blank Page</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<h2>Township Edit Form</h2>
				<form method="post" action="{{route('township.update',$township->id)}}" class="my-5">
					 @csrf
         			@method('PUT')
					<div class="form-group row mx-5">
						<label class="col-lg-2 col-md-2 col-sm-2 col-12">Name</label>
						<input type="text" name="name" class="form-control col-12 col-sm-10 col-lg-10 col-md-10" value="{{$township->name}}">
					</div>
					<div class="form-group row mx-5">
						<label class="col-lg-2 col-md-2 col-sm-2 col-12">Price</label>
						<input type="number" name="price" class="form-control col-12 col-sm-10 col-lg-10 col-md-10" value="{{$township->price}}">
					</div>

					<div class="form-group mx-5">
						<input type="submit" name="btnsubmit" value="Update" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
@endsection