@extends('frontend.frontend_template')
@section('content')
<div class="container my-5">
	
	<form method="POST" action="{{route('frontend.customerupdate',$customer->id)}}" enctype="multipart/form-data">
		@csrf
		{{-- @method('PUT'); --}}
		<input type="hidden" name="user_id" value="{{$customer->user_id}}">
        <input type="hidden" name="status" value="{{$customer->status}}">
		<div class="row">
			<div class="col-4">
				<label class="">Photo</label>
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
							<img src="{{asset($customer->profile)}}" width="100px" height="100px" id="add_image" class="img-fluid">
							<input type="hidden" name="oldphoto" value="{{$customer->profile}}">
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
			<div class=" col-lg-8">
				<div class="row">
					<div class="form-group col-lg-4">
						<label for="name" class="col-sm-2 col-form-label">Name</label>
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$customer->user->name}}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-group col-lg-4">
						<label for="email" class="col-form-label">Email</label>
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$customer->user->email}}" required autocomplete="email">

            			@error('email')
            			<span class="invalid-feedback" role="alert">
              				<strong>{{ $message }}</strong>
            			</span>
            			@enderror
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-4">
						<label>Phone no:</label>
            				<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$customer->phone}}">
            			@error('phone')
            			<span class="invalid-feedback" role="alert">
              				<strong>{{ $message }}</strong>
            			</span>
            			@enderror
					</div>
					<div class="form-group col-lg-4">
						<label for="business_type" >Business Type</label>
                            <input id="business_type" type="text" class="form-control" name="business_type" value="{{ $customer->business_type }}" required>
                        
                        @error('business_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
				</div>
				<div class=" row mr-5 pr-5">
					<label>Address:</label>
            			<textarea class="form-control @error('address') is-invalid @enderror" name="address" >{{$customer->address}}</textarea>
            		@error('address')
            		<span class="invalid-feedback" role="alert">
              			<strong>{{ $message }}</strong>
            		</span>
            		@enderror
				</div>

				<div class="form-group row ">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                    
                </div>
			</div>
		</div>

	</form>
</div>
@endsection

{{-- <div class="form-group row">

					<label for="photo_id" class="form-label"> Photo <small class="text-danger"> (* jpeg | jpg | png) </small></label>
					<div class="">
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
								<img src="{{asset($customer->profile)}}" width="100px" height="100px" id="add_image" class="img-fluid">
								<input type="hidden" name="oldphoto" value="{{$customer->profile}}">
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

				<div class="row">
					<div class="col-4">
						<label for="name" class="col-sm-2 col-form-label">Name</label>

                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$customer->user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
					</div>
				</div>
				
				 --}}