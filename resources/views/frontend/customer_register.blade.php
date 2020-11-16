@extends('frontend.frontend_template')

@section('content')
	<div class="jumbotron jumbotron-fluid subtitle bg-info" >
		<div class="container ">
			<h1 class="text-center">Create Account</h1>
		</div>
	</div>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-8">
				<form method="POST" action="{{ route('frontend.customerstore') }}" enctype="multipart/form-data" class="mx-5 my-3">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Name</label>

						<div class="col-sm-10">
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">E-Mail</label>

						<div class="col-sm-10">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="password" class="col-sm-2 col-form-label">Password</label>

						<div class="col-sm-10">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="password-confirm" class="col-sm-2 col-form-label">Confirm Password</label>

						<div class="col-sm-10">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>
					</div>
					{{-- ======================== --}}
					<div class="form-group row">
						<label for="photo_id" class="col-sm-2 col-form-label"> Photo <small class="text-danger"> (* jpeg | jpg | png) </small></label>
						<div class="col-sm-10">
							<input type="file" id="photo_id" name="photo"  class="form-control-file @error('photo') is-invalid @enderror" value="{{old('photo')}}">
							@error('photo')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>  

					<div class="form-group row">
						<label for="phone" class="col-sm-2 col-form-label">Phone</label>

						<div class="col-sm-10">
							<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
						</div>
						@error('phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label">Address</label>

						<div class="col-sm-10">
							<textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address') }}</textarea> 
						</div>
						@error('address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="form-group row">
						<label for="business_type" class="col-sm-2 col-form-label">Business Type</label>

						<div class="col-sm-10">
							<input id="business_type" type="text" class="form-control @error('business_type') is-invalid @enderror" name="business_type" value="{{ old('email') }}" placeholder="eg. Fashion Shop" required>
						</div>
						@error('business_type')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					{{-- ============================== --}}

					<div class="form-group d-flex algin-items-center justify-content-between mt-4 mb-0">
						<button type="submit" class="btn btn-primary mainfullbtncolor btn-block">Register</button>
					</div>
				</form>
				<div class=" mt-3 text-center text-primary">
		  			<a href="" class="loginLink text-decoration-none">Have an account? Go to login</a>
		  		</div>
			</div>
		</div>
	</div>
@endsection