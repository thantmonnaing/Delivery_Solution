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
				<form method="post" action="{{route('frontend.deliverstore')}}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Photo</label>
						<input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
						@error('photo')
						<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
						@enderror
					</div>

					<div class="form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="form-group ">
						<label for="email" >Email:</label>
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror

					</div>

					<div class="form-group row">
						<div class="col-lg-6">
							<label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>

							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col-lg-6">
							<label for="password-confirm" class=" col-form-label ">{{ __('Confirm Password') }}</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>
					</div>

					<div class="form-group">
						<label for="birthday">Date of Birth:</label>
						<input id="birthday" type="date" name="form" class="form-control  @error('birthday') is-invalid @enderror"  value="{{ old('form') }}" required autocomplete="birthday" autofocus >

						@error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<div id="gender-group" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
							<label class="mr-5">Gender:</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="male"  value="Male"> {{ (old('sex') == 'male') ? 'checked' : '' }}
								<label class="form-check-label" for="male">Male</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="female" value="Female"> {{ (old('sex') == 'female') ? 'checked' : '' }}
								<label class="form-check-label" for="female">Female</label>
							</div>
							 @error('gender')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>              
					</div>

					<div class="form-group">
						<label>Phone no:</label>
						<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="">
						@error('phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="form-group">
						<label>Address:</label>
						<textarea class="form-control @error('address') is-invalid @enderror" name="address" ></textarea>
						@error('address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="form-group">
						<div id="job-group" class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
							<label class="mr-5 pr-5">Job Type</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="fulltime" name="job" value="{{old('time')}}"> {{ (old('sex') == 'fulltime') ? 'checked' : '' }}
								<label class="form-check-label" for="fulltime">Full Time</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="parttime" name="job" value="{{old('time')}}"> {{ (old('sex') == 'parttime') ? 'checked' : '' }}
								<label class="form-check-label" for="parttime">Part Time</label>
							</div>
							@error('job')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
					</div>

					<div class="form-group">
						<label class="mr-5 pr-5">Job Day</label>
						<div class="form-check form-check-inline">  					
							<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="monday" name="day">
							<label class="form-check-label" for="inlineCheckbox1">Monday</label>
						</div>
						<div class="form-check form-check-inline"> 					
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="tuesday" name="day">
							<label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="wednesday" name="day">
							<label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
						</div>
						<div class="form-check form-check-inline">  					
							<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="thursday" name="day">
							<label class="form-check-label" for="inlineCheckbox1">Thursday</label>
						</div>
						<div class="form-check form-check-inline">  					
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="friday" name="day">
							<label class="form-check-label" for="inlineCheckbox2">Friday</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="saturday" name="day">
							<label class="form-check-label" for="inlineCheckbox3">Saturday</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="sunday" name="day">
							<label class="form-check-label" for="inlineCheckbox3">Sunday</label>
						</div>
					</div>

					<div class="form-group row">
						<label class=" mr-4 mt-4 ml-3 pr-5" >Job Time</label>

						<div class="col-md-3">
							<div class="form-group date">
								<label for="start_time">Start Time</label>
								<input type="time" name="time" class="form-control @error('time') is-invalid @enderror"  value="{{ old('time') }}" id="start_time" required autocomplete="birthday" autofocus >
								@error('time')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        		@enderror
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group date">
								<label for="end_time">End Time</label>
								<input type="time" name="time" class="form-control @error('time') is-invalid @enderror"  value="{{ old('time') }}" id="end_time" required autocomplete="birthday" autofocus>
								@error('time')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        		@enderror
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="mr-5">Trasport Type</label>
						<div class="form-check form-check-inline">  					
							<input class="form-check-input" type="radio" name="transport" id="inlineRadio1" value="car">
							<label class="form-check-label" for="inlineRadio1">Car</label>
						</div>
						<div class="form-check form-check-inline"> 					
							<input class="form-check-input" type="radio" name="transport" id="inlineRadio2" value="bicycle">
							<label class="form-check-label" for="inlineRadio2">Bicycle</label>
						</div>
					</div>

					<div class="form-group">
						<label class="mr-5">Payment Type</label>
						<div class="form-check form-check-inline">	
							<input class="form-check-input" type="checkbox" name="payment" id="payment_type1" value="kbz">
							<label class="form-check-label" for="payment_type1">KBZpay</label>
						</div>
						<div class="form-check form-check-inline">  				
							<input class="form-check-input" type="checkbox" name="payment" id="payment_type2" value="wave">
							<label class="form-check-label" for="payment_type2">WaveMoney</label>
						</div>
						<div class="form-check form-check-inline">  				
							<input class="form-check-input" type="checkbox" name="payment" id="payment_type3" value="okdoller">
							<label class="form-check-label" for="payment_type3">OKdoller</label>
						</div>
					</div>
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