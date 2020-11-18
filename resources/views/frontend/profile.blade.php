@extends('frontend.frontend_template')
@section('content')
<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-8">
			<form method="POST" action="" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="form-group row">

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
			</form>
		</div>
	</div>
</div>
@endsection