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
							<label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>
					</div>

					<div class="form-group">
						<label>Date of Birth:</label>
						<input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" id="fromDate" value="{{old('dob')}}">
						@error('dob')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="form-group @error('gender') is-invalid @enderror">
						<label class="mr-5">Gender:</label>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" {{ old('gender') == "male" ? 'checked' : '' }}>
							@error('gender')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
							<label class="form-check-label" for="inlineRadio1">Male</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" {{ old('gender') == "female" ? 'checked' : '' }}>
							@error('gender')
							<span class="invalid-feedback" role="alert">								<strong>{{ $message }}</strong>
							</span>
							@enderror 
							<label class="form-check-label" for="inlineRadio2">Female</label>
						</div>						             
					</div>

					<div class="form-group">
						<label>Phone no:</label>
						<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
						@error('phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="form-group">
						<label>Address:</label>
						<textarea class="form-control @error('address') is-invalid @enderror" name="address">{{old('address')}}</textarea>
						@error('address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<fieldset class="border pl-5 mb-5">
						<legend class="w-auto mb-1">Job Type:</legend>
						<div class="form-group mb-4">
							<label class="mr-5 pr-5"></label>
							<div class="form-check form-check-inline">
								<input class="form-check-input job" type="radio" id="radio1" value="fulltime" name="job" {{ old('job') == "fulltime" ? 'checked' : '' }}>
								<label class="form-check-label" for="radio1">Full Time</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input job" type="radio" id="radio2" value="parttime" name="job" {{ old('job') == "parttime" ? 'checked' : '' }}>
								<label class="form-check-label" for="radio2">Part Time</label>
							</div>
							@error('job')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</fieldset>

					<fieldset class="border pl-5 mb-5">
						<legend class="w-auto mb-1">Job Day:</legend>
						<div class="form-group mb-4">
							<label class="mr-5 pr-5"></label>
							<div class="form-check form-check-inline">  					
								<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="monday" name="day[]" {{ (is_array(old('day')) && in_array('monday', old('day'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="inlineCheckbox1">Monday</label>
							</div>
							<div class="form-check form-check-inline"> 					
								<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="tuesday" name="day[]" {{ (is_array(old('day')) && in_array('tuesday', old('day'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="wednesday" name="day[]" {{ (is_array(old('day')) && in_array('wednesday', old('day'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
							</div>
							<div class="form-check form-check-inline">  					
								<input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="thursday" name="day[]" {{ (is_array(old('day')) && in_array('thursday', old('day'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="inlineCheckbox4">Thursday</label>
							</div>
							<div class="form-check form-check-inline">  					
								<input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="friday" name="day[]" {{ (is_array(old('day')) && in_array('friday', old('day'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="inlineCheckbox5">Friday</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="saturday" name="day[]" {{ (is_array(old('day')) && in_array('saturday', old('day'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="inlineCheckbox6">Saturday</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="sunday" name="day[]" {{ (is_array(old('day')) && in_array('sunday', old('day'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="inlineCheckbox7">Sunday</label>
							</div>
							@error('day')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>						
					</fieldset>

					<fieldset class="time_fieldset border pl-5 mb-5">
						<legend class="w-auto mb-1">Job Time:</legend>
						<div class="form-group row mb-4">							
							<label class=" mr-4 mt-4 ml-3 pr-5" ></label>
							<div class="col-md-3">
								<div class="form-group date">
									<label for="start_time">Start Time</label>
									<input type="time" name="start_time" class="form-control" id="start_time" value="{{old('start_time')}}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group date">
									<label for="end_time">End Time</label>
									<input type="time" name="end_time" class="form-control" id="end_time" value="{{old('end_time')}}">
								</div>
							</div>						
						</div>
					</fieldset>

					<fieldset class="border pl-5 mb-5">
						<legend class="w-auto mb-1">Townships:</legend>
						<div class="form-group mb-4">						
							<label class="mr-4 mt-4 ml-3 pr-5"></label>
							@php
								$i = 1;
							@endphp
							@foreach($townships as $row)
								<div class="form-check form-check-inline">	
									<input class="form-check-input" type="checkbox" name="township[]" id="township{{$i}}" value="{{$row->id}}" {{ (is_array(old('township')) && in_array($row->id, old('township'))) ? ' checked' : ''}}>
									<label class="form-check-label" for="township{{$i}}">{{$row->name}}</label>
								</div>
								@php $i++; @endphp
							@endforeach
							@error('township')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror		
						</div>
					</fieldset>	

					<fieldset class="border pl-5 mb-5">
						<legend class="w-auto mb-1">Transport Type:</legend>
						<div class="form-group mb-4">
							<label class="mr-4 mt-4 ml-3 pr-5"></label>
							<div class="form-check form-check-inline"> 					
								<input class="form-check-input" type="radio" name="transport" id="tranradio1" value="car" {{ old('transport') == "car" ? 'checked' : '' }}>
								<label class="form-check-label" for="tranradio1">Car</label>
							</div>
							<div class="form-check form-check-inline"> 					
								<input class="form-check-input" type="radio" name="transport" id="tranradio2" value="motorbike" {{ old('transport') == "motorbike" ? 'checked' : '' }}>
								<label class="form-check-label" for="tranradio2">Motorbike</label>
							</div>
							<div class="form-check form-check-inline"> 					
								<input class="form-check-input" type="radio" name="transport" id="tranradio3" value="bicycle" {{ old('transport') == "bicycle" ? 'checked' : '' }}>
								<label class="form-check-label" for="tranradio3">Bicycle</label>
							</div>
							<div class="form-check form-check-inline"> 					
								<input class="form-check-input" type="radio" name="transport" id="tranradio4" value="other" {{ old('transport') == "other" ? 'checked' : '' }}>
								<label class="form-check-label" for="tranradio4">Other</label>
							</div>
							@error('transport')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</fieldset>

					<fieldset class="border pl-5 mb-5">
						<legend class="w-auto mb-1">Payment Type:</legend>
						<div class="form-group mb-4">					
							<label class="mr-4 mt-4 ml-3 pr-5"></label>
							<div class="form-check form-check-inline">	
								<input class="form-check-input" type="checkbox" name="payment[]" id="payment_type1" value="kbz" {{ (is_array(old('payment')) && in_array('kbz', old('payment'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="payment_type1">KBZpay</label>
							</div>
							<div class="form-check form-check-inline">  			
								<input class="form-check-input" type="checkbox" name="payment[]" id="payment_type2" value="wave" {{ (is_array(old('payment')) && in_array('wave', old('payment'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="payment_type2">WaveMoney</label>
							</div>
							<div class="form-check form-check-inline"> 				
								<input class="form-check-input" type="checkbox" name="payment[]" id="payment_type3" value="okdoller" {{ (is_array(old('payment')) && in_array('okdoller', old('payment'))) ? ' checked' : ''}}>
								<label class="form-check-label" for="payment_type3">OKdoller</label>
							</div>
							@error('payment')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</fieldset>		
					
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
	<script type="text/javascript">
		$(document).ready(function(){
			jobType();

			$('.job').change(function(){
				jobType();
			});

			function jobType(){
				var job = $("input[name='job']:checked").val();				
				if(job == "parttime"){
					$('.time_fieldset').prop('disabled',false);
				}else{
					$('.time_fieldset').prop('disabled',true);
				}
			}
		})
	</script>
@endsection