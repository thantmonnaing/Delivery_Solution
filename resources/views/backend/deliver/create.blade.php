@extends('backend/backend_template')

@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Deliver Form</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('deliver.index')}}" class="btn btn-primary">Back</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-12">
			<div class="tile">
				<form method="post" action="{{route('deliver.store')}}" enctype="multipart/form-data">
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
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="">
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
							<label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>
					</div>

					<div class="form-group">
						<label>Date of Birth:</label>
						<input type="date" name="form" class="form-control" id="fromDate" value="">
					</div>

					<div class="form-group">
						<label class="mr-5">Gender:</label>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
							<label class="form-check-label" for="inlineRadio1">Male</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
							<label class="form-check-label" for="inlineRadio2">Female</label>
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
						<label class="mr-5 pr-5">Job_type:</label>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="fulltime" name="job">
							<label class="form-check-label" for="inlineCheckbox1">Full Time</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="parttime" name="job">
							<label class="form-check-label" for="inlineCheckbox2">Part Time</label>
						</div>
					</div>

					<div class="form-group">
						<label class="mr-5 pr-5">Job_day:</label>
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
						<label class=" mr-4 mt-4 ml-3 pr-5" >Job Time:</label>

						<div class="col-md-3">
							<div class="form-group date">
								<label for="start_time">Start Time</label>
								<input type="time" name="time" class="form-control" id="start_time">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group date">
								<label for="end_time">End Time</label>
								<input type="time" name="time" class="form-control" id="end_time">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="mr-5">Transport Type:</label>
						<div class="form-check form-check-inline">  					
							<input class="form-check-input" type="radio" name="transport" id="inlineRadio1" value="car">
							<label class="form-check-label" for="inlineRadio1">Vehicle</label>
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
							<input class="form-check-input" type="checkbox" name="payment" id="payment_type2" value="wave"  >
							<label class="form-check-label" for="payment_type2">WaveMoney</label>
						</div>
						<div class="form-check form-check-inline">  				
							<input class="form-check-input" type="checkbox" name="payment" id="payment_type3" value="okdoller"  >
							<label class="form-check-label" for="payment_type3">OKdoller</label>
						</div>
					</div>
					
					
					<div class="form-group">
						<input type="submit" name="btnsubmit" value="Save" class="btn btn-primary">
					</div>
				</form>

			</div>
		</div>
	</div>
</main>
@endsection

@section('script')
	{{-- <script type="text/javascript">
		$(document).ready(function(){
			var options = [];
			var payments = [];

			$( '.dropdown-menu a' ).on( 'click', function( event ) {

			   var $target = $( event.currentTarget ),
			       val = $target.attr( 'data-value' ),
			       $inp = $target.find( 'input' ),
			       idx;

			   if ( ( idx = options.indexOf( val ) ) > -1 ) {
			      options.splice( idx, 1 );
			      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
			   } else {
			      options.push( val );
			      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
			   }

			   $( event.target ).blur();
			      
			   console.log( options );
			   return false;
			});

			$( '.payment_item a' ).on( 'click', function( event ) {

			   var $target = $( event.currentTarget ),
			       val = $target.attr( 'data-value' ),
			       $inp = $target.find( 'input' ),
			       idx;

			   if ( ( idx = options.indexOf( val ) ) > -1 ) {
			      options.splice( idx, 1 );
			      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
			   } else {
			      options.push( val );
			      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
			   }

			   $( event.target ).blur();
			      
			   console.log( options );
			   return false;
			});
		})
	</script> --}}
@endsection

{{-- <div class="form-group">

	<div class="button-group">
		<button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Payment Type</button>
		<ul>
			<div class="dropdown-menu">
				<a class="payment_item" href="#" data-value="kbz" tabIndex="-1">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="pay1" value="kbz" name="payment">
						<label class="custom-control-label" for="pay1">KBZPay</label>
					</div>
				</a>	
				<a class="payment_item" href="#" data-value="wave" tabIndex="-1">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="pay2" value="wave" name="payment">
						<label class="custom-control-label" for="pay2">Wave Money</label>
					</div>
				</a>	
				<a class="payment_item" href="#" data-value="okdoller" tabIndex="-1">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="pay3" value="okdoller" name="township">
						<label class="custom-control-label" for="pay3">OKdoller</label>
					</div>

					<div class="form-check form-check-inline">		
						<input class="form-check-input" type="radio" name="payment" id="inlineRadio3" value="okdoller">
						<label class="form-check-label" for="inlineRadio3">OKdoller</label>
					</div>
				</a>							    	
			</div>
		</ul>
	</div>
</div>

<div class="form-group">
	<div class="button-group">
		<button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose Township</button>
		<ul>
			<div class="dropdown-menu">
				@foreach($townships as $row)
				<a class="dropdown-item" href="#" data-value="{{$row->id}}" tabIndex="-1">
					<!-- Default unchecked -->
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="checkbox{{$row->id}}" value="{{$row->id}}" name="township">
						<label class="custom-control-label" for="checkbox{{$row->id}}">{{$row->name}}</label>
					</div>
				</a>							    	
				@endforeach
			</div>
		</ul>
	</div>
</div> --}}