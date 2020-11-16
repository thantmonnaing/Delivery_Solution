@extends('frontend.frontend_template')
@section('content')
	<div class="jumbotron jumbotron-fluid subtitle bg-info mt-1" >
		<div class="container ">
			<h1 class="text-center">Order</h1>
		</div>
	</div>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-8">
				<form method="POST" action="">
					<div class="form-group row">
						<label class="col-lg-2 col-md-2 col-sm-2 col-12">Order Date</label>
						<div class="col-sm-10">
							<input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}" required autocomplete="date" autofocus>

							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>
					</div>
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

					<div class="form-group">
						<label class="mr-5" for="payment_type">Payment_type:</label>
						<div class="form-check form-check-inline">	
							<input class="form-check-input" type="radio" name="payment" id="payment_type1" value="kbz">
							<label class="form-check-label" for="payment_type1">KBZpay</label>
						</div>
						<div class="form-check form-check-inline">  				
							<input class="form-check-input" type="radio" name="payment" id="payment_type2" value="wave">
							<label class="form-check-label" for="payment_type2">WaveMoney</label>
						</div>
						<div class="form-check form-check-inline">  				
							<input class="form-check-input" type="radio" name="payment" id="payment_type3" value="okdoller">
							<label class="form-check-label" for="payment_type3">OKdoller</label>
						</div>
					</div>
					<div class="form-group d-flex algin-items-center justify-content-between mt-4 mb-0">
						<button type="submit" class="btn btn-primary mainfullbtncolor btn-block">Order</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection