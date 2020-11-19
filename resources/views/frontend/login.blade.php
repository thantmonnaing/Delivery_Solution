@extends('frontend.frontend_template')
@section('content')
<section>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Login') }}</div>
					<div class="card-body">
						{{-- @if (session('message'))
        					<div class="alert alert-danger">{{ session('message') }}</div>
    					@endif --}}
    					@if (Session::has('message'))
   							<div class="alert alert-danger">{{ Session::get('message') }}</div>
						@endif
						<form method="POST" action="{{ route('login') }}">
							@csrf

							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-6 offset-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											{{ __('Remember Me') }}
										</label>
									</div>
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Login') }}
									</button>

									@if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
									@endif
								</div>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div id="contact" class="footer">
			<div class="container">
				<div class="row pdn-top-30">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<ul class="location_icon">
							<li> <a href="#"><img src="{{asset('frontend_asset/icon/facebook.png')}}"></a></li>
							<li> <a href="#"><img src="{{asset('frontend_asset/icon/Twitter.png')}}"></a></li>
							<li> <a href="#"><img src="{{asset('frontend_asset/icon/linkedin.png')}}"></a></li>
							<li> <a href="#"><img src="{{asset('frontend_asset/icon/instagram.png')}}"></a></li>
						</ul>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="Follow">
							<h3>CONTACT US</h3>
							<span>123 Second Street Fifth <br>Avenue,<br>
								Manhattan, New York<br>
							+987 654 3210</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="Follow">
							<h3>ADDITIONAL LINKS</h3>
							<ul class="link">
								<li> <a href="#">About us</a></li>
								<li> <a href="#">Terms and conditions</a></li>
								<li> <a href="#"> Privacy policy</a></li>
								<li> <a href="#">News</a></li>
								<li> <a href="#"> Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
						<div class="Follow">
							<h3> Contact</h3>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<input class="Newsletter" placeholder="Name" type="text">
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<input class="Newsletter" placeholder="Email" type="text">
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<textarea class="textarea" placeholder="comment" type="text">Comment</textarea>
								</div>
							</div>
							<button class="Subscribe">Submit</button>
						</div>
					</div>
				</div>
				<div class="copyright">
					<div class="container">
						<p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</section>
@endsection