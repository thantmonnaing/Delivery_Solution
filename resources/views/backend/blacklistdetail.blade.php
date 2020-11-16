@extends('backend.backend_template')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Blacklist Detail</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('customer.index')}}" class="btn btn-primary">Back</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row m-5">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <img src="{{asset($customer->profile)}}" class="img-fluid">
                            </div>  

                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4> {{$customer->user->name}} </h4>
                                    </div>
                                    <div class="card-body">
                                        <p> {{$customer->user->email}}</p>

                                        <p> {{$customer->phone}}</p>

                                        <p> {{$customer->address}}</p>

                                        <p> {{$customer->business_type}} </p>
                                    </div>
                                    <div class="card-footer">
                                        <form method="post" action="{{route('customer.block',$customer->id)}}" onsubmit="return confirm('Are you sure to Block?')" class="d-inline-block">
                                            @csrf
                                            <input type="submit" name="btnsubmit" value="Block" class="btn btn-danger">                                 
                                        </form>
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