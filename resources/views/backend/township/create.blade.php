@extends('backend/backend_template')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{route('township.index')}}">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="tile ">
          <h2 class="d-inline-block">Township Form</h2>
          <a href="{{route('township.index')}}" class="btn btn-info float-right ">Back</a>
          <form method="post" action="{{route('township.store')}}" enctype="multipart/form-data">
            
            @csrf
            <div class="form-group row mx-5 my-5">
              <label class="col-lg-2 col-md-2 col-sm-2 col-12">Name:</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror col-lg-10 col-sm-10 col-md-10 col-12" placeholder="Name..." value="{{old('name')}}">
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group row mx-5">
              <label class="col-lg-2 col-md-2 col-sm-2 col-12">Price:</label>
              <input type="number" name="price" id="price" class="form-control col-lg-10 col-md-10 col-sm-10 col-12" placeholder="Price...">
            </div>

            <div class="form-group mx-5 ">
              <input type="submit" name="btnsubmit" value="Save" class="btn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
