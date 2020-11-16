@extends('backend.backend_template')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Customer Update</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('customer.index')}}" class="btn btn-primary">Back</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('customer.update',$customer->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{$customer->user_id}}">
                            <input type="hidden" name="status" value="{{$customer->status}}">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>

                                <div class="col-sm-10">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $customer->user->name }}" required autocomplete="name" autofocus>

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $customer->user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Photo <small class="text-danger"> (* jpeg | jpg | png) </small></label>
                                <div class="col-sm-10">
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


                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>

                                <div class="col-sm-10">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $customer->phone }}" required>
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
                                    <textarea id="address" class="form-control" name="address" required>{{ $customer->address }}</textarea> 
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
                                    <input id="business_type" type="text" class="form-control" name="business_type" value="{{ $customer->business_type }}" required>
                                </div>
                                @error('business_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group row mt-5">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>               
    </main>   
@endsection