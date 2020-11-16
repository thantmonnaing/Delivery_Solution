@extends('backend.backend_template')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Black Lists</h1>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Customer</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Deliver</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-hover table-bordered sampleTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                    $i = 1; 
                                    @endphp
                                    @foreach($customers as $row)
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$row->user->name}} </td>
                                        <td> {{$row->user->email}} </td>
                                        <td>
                                            <a href="{{route('customer.show',$row->id)}}" class="btn btn-info">Detail</a> 
                                            <form method="post" action="{{route('customer.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to Delete?')" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">                                
                                            </form>
                                            <a href="{{route('customer.unblock',$row->id)}}" class="btn btn-success">Unblock</a> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                         
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                             <table class="table table-hover table-bordered sampleTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                    $i = 1; 
                                    @endphp
                                    @foreach($delivers as $row)
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$row->user->name}} </td>
                                        <td> {{$row->user->email}} </td>
                                        <td>
                                            <a href="{{route('deliver.show',$row->id)}}" class="btn btn-info">Detail</a> 
                                            <form method="post" action="{{route('deliver.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to Delete?')" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">                                 
                                            </form>
                                            <a href="{{route('deliver.unblock',$row->id)}}" class="btn btn-success">Unblock</a> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')

<script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
	$('.sampleTable').DataTable();
</script>

@endsection