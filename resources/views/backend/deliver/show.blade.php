@extends('backend/backend_template')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i>Deliver Detail</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('customer.index')}}" class="btn btn-primary">Back</a></li>
      </ul>
    </div>
    <div class="title">
      <div class="title-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row m-5">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <img src="{{asset($deliver->profile)}}" class="img-fluid mt-5 pt-5">
              </div>

              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{$deliver->user->name}}</h4>
                  </div>
                  <div class="card-body">
                    <p>{{$deliver->user->email}}</p>

                    <p>{{$deliver->phone}}</p>

                    <p>{{$deliver->address}}</p>

                    <p>{{$deliver->dob}}</p>

                    <p>{{$deliver->gender}}</p>

                    <p>{{$deliver->job_type}}</p>

                    <p>{{$deliver->job_day}}</p>

                    <p>{{$deliver->job_time}}</p>

                    <p>{{$deliver->transport_type}}</p>

                    <p>{{$deliver->payment_type}}</p>
                  </div>

                  <div class="card-footer">
                    @if($deliver->status ==0)
                    <form method="POST" action="{{route('deliver.block',$deliver->id)}}" onsubmit="return confirm('Are you sure to Block?')" class="d-inline-block">
                      @csrf
                      <input type="submit" name="btnsubmit" value="Block" class="btn btn-danger">
                    </form>
                    @else
                      <a href="{{route('deliver.unblock',$deliver->id)}}" class="btn btn-success">Unblock</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
