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
      <li class="breadcrumb-item"><a href="{{route('deliver.index')}}">Back</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h2>Deliver Detail</h2>
        <div class="row mt-4 mx-5">
          <div class="col-lg-6">
            <img src="{{asset($deliver->profile)}}" class="img-fluid">
          </div>
        
          <div class="col-lg-6">
            <p >Name: <b class="mx-5 px-5">{{$deliver->user->name}}</b></p>
            <p>Email: <b class="mx-5 px-5">{{$deliver->user->email}}</b></p>
            <p>Gender: <b class="mx-5 px-5">{{$deliver->gender}}</b></p>
            <p>Dirth of Birth: <b class="mx-5">{{$deliver->dob}}</b></p>
            <p>Job Day:<b class="mx-5 px-5">{{$deliver->job_day}}</b></p>
            <p>Job Type:<b class="mx-5 px-5">{{$deliver->job_type}}</b></p>
            <p>Job Time:<b class="mx-5 px-5">{{$deliver->job_time}}</b></p>
            <p>Transport Type:<b class="mx-5 px-2">{{$deliver->transport_type}}</b></p>
            <p>Payment Type:<b class="mx-5 px-2">{{$deliver->payment_type}}</b></p>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>
@endsection
