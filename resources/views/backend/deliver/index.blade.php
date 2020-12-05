@extends('backend/backend_template')

@section('content')
	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Deliver Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('deliver.create')}}" class="btn btn-primary">Add Deliver</a></li>
        </ul>
      </div>
      <div class="row ">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
          <div class="tile">          
            <table class="table py-5 table-bordered my-5" id="sampleTable">
              <thead >
                <tr>
                  <th>No</th>
                  <th>Profile</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	 @php 
              	$i=1;
            	@endphp
                @foreach($deliver as $del)
                <tr>
                	<th>{{$i++}}</th>
                	<th><img src="{{asset($del->profile)}}" width="100" height="100"></th>
                	<th>{{$del->user->name}}</th>
                	<th>
                    <p>{{$del->user->email}}</p>
                    <p>{{$del->phone}}</p>
                		<p>{{$del->address}}</p>
                	</th>
                	<td>
                  		<a href="{{route('deliver.edit',$del->id)}}" class="btn btn-success">Edit</a>
                  		<a href="{{route('deliver.show',$del->id)}}" class="btn btn-info">detail</a>
                  		<form method="post" action="{{route('deliver.destroy',$del->id)}}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
                  			@csrf
                  			@method('DELETE')
                    		<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                  		</form>
                  		<form method="post" action="{{route('deliver.block',$del->id)}}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Block?')">
                  			@csrf
                  			
                    		<input type="submit" name="btnsubmit" value="Block" class="btn btn-warning">
                  		</form>
                	</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
   <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection