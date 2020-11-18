@extends('frontend.frontend_template')
@section('content')
<div class="container mt-5">
	<div class="card shadow ">
		<div class="card-body">
			<form method="POST" action="{{route('frontend.deliverupdate',$deliver->id)}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="user_id" value="{{$deliver->user_id}}">
				<input type="hidden" name="status" value="{{$deliver->status}}">


				<div class="row">
					<div class="col-lg-4 ">
						<div><label>Photo</label></div>
						<div class="d-block">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a href="#oldphoto" class="nav-link active" id="oldphoto_tab" data-toggle="tab" role="tab" aria-controls="oldphoto" aria-selected="true">Old photo</a>
								</li>
								<li class="nav-item">
									<a href="#photo" class="nav-link" id="photo_tab" data-toggle="tab" role="tab" aria-controls="photo" aria-selected="false">New photo</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="oldphoto" role="tab-panel" aria-labelledby="oldphoto_tab">
									<img src="{{asset($deliver->profile)}}" width="100px" height="100px" id="add_image" class="img-fluid">
									<input type="hidden" name="oldphoto" value="{{$deliver->profile}}">
								</div>
								<div class="tab-pane fade" id="photo" role="tab-panel" aria-labelledby="photo_tab">
									<input type="file" id="photo" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
									@error('photo')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-8">
						<div class="form-group row">
							<div class="col-lg-4">
								<label for="name" class="col-form-label">Name</label>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$deliver->user->name}}" required autocomplete="name" autofocus>
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="col-lg-4">
								<label for="email" class="col-form-label">Email</label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$deliver->user->email}}" required autocomplete="email">

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-4">
								<label>Phone no:</label>
								<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$deliver->phone}}">
								@error('phone')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="col-lg-4">
								<label for="birthday">Date of Birth:</label>
								<input id="birthday" type="date" name="form" class="form-control  @error('birthday') is-invalid @enderror"  value="{{$deliver->dob }}" required>

								@error('birthday')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-lg-4">
								<label class="col-form-label">Address:</label>
								<textarea class="form-control @error('address') is-invalid @enderror" name="address" >{{$deliver->address}}</textarea>
								@error('address')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="col-lg-4 mt-4">
								<div id="gender-group" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
									<label class="mr-5">Gender:</label>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gender" id="male"  value="Male" required autocomplete="gender" > {{ (old('sex') == 'male') ? 'checked' : '' }}
										<label class="form-check-label" for="male">Male</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gender" id="female" value="Female" required autocomplete="gender" > {{ (old('sex') == 'female') ? 'checked' : '' }}
										<label class="form-check-label" for="female">Female</label>
									</div>
									@error('gender')
									<span class="help-block">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>      
							</div>
						</div>

						<div class="form-group row">
							<label class=" ml-4 mt-4 " >Job Time</label>

							<div class="col-md-3">
								<div class="form-group date">
									<label for="start_time">Start Time</label>
									<input id="start_time" type="time" name="time" class="form-control @error('time') is-invalid @enderror"  value="{{ $deliver->job_time }}" id="start_time" required autocomplete="start_time" autofocus  required>
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
									<input id="end_time" type="time" name="time" class="form-control @error('time') is-invalid @enderror"  value="{{$deliver->job_time }}" id="end_time" required autocomplete="end_time" autofocus required>
									@error('time')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>

						<div class="form-group">

							<label class="mr-5 pr-5">Job Type</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="fulltime" name="job" value="fulltime" required>
								<label class="form-check-label" for="fulltime">Full Time</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="parttime" name="job" value="parttime" required> 
								<label class="form-check-label" for="parttime">Part Time</label>
							</div>
						</div>

						<div class="form-group">
							<label class="mr-5 pr-5">Job Day</label>
							<div class="form-check form-check-inline">  					
								<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="monday" name="day"  >
								<label class="form-check-label" for="inlineCheckbox1">Monday</label>
							</div>
							<div class="form-check form-check-inline"> 					
								<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="tuesday" name="day" >
								<label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="wednesday" name="day" >
								<label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
							</div>
							<div class="form-check form-check-inline">  					
								<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="thursday" name="day" >
								<label class="form-check-label" for="inlineCheckbox1">Thursday</label>
							</div>
							<div class="form-check form-check-inline">  					
								<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="friday" name="day" >
								<label class="form-check-label" for="inlineCheckbox2">Friday</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="saturday" name="day" >
								<label class="form-check-label" for="inlineCheckbox3">Saturday</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="sunday" name="day" >
								<label class="form-check-label" for="inlineCheckbox3">Sunday</label>
							</div>
						</div>

						<div class="form-group">
							<label class="mr-5">Trasport Type</label>
							<div class="form-check form-check-inline">  					
								<input class="form-check-input" type="radio" name="transport" id="inlineRadio1" value="car" required>
								<label class="form-check-label" for="inlineRadio1">Car</label>
							</div>
							<div class="form-check form-check-inline"> 					
								<input class="form-check-input" type="radio" name="transport" id="inlineRadio2" value="bicycle" required>
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

						<div class="form-group row">
							<button type="submit" class="btn btn-primary">
								Save
							</button>
						</div>
					</div>
				</div>
				
			</form>
		</div>
	</div>
</div>
@endsection