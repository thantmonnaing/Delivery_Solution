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
          <li class="breadcrumb-item"><a href="{{route('deliver.create')}}">Form page</a></li>
        </ul>
      </div>
      <div class="row ">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
          <div class="tile">
            <h2 class="d-inline-block mb-5">Deliver List</h2>
              <a href="{{route('deliver.create')}}" class="btn btn-info float-right">Add New</a>
          
            <table class="table py-5 table-bordered my-5" id="sampleTable">
              <thead >
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Codeno</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	
                	<td>
                  		<a href="" class="btn btn-success">Edit</a>
                  		<a href="" class="btn btn-info">detail</a>
                  		<form method="post" action="" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
                  			@csrf
                  			
                    		<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                  		</form>
                  		<form method="post" action="" class="d-inline-block" onsubmit="return confirm('Are you Sure to Block?')">
                  			@csrf
                  			
                    		<input type="submit" name="btnsubmit" value="Block" class="btn btn-warning">
                  		</form>
                	</td>
                </tr>
                

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