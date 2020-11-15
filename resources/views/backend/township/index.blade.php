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
            <h2 class="d-inline-block mb-5">Township List</h2>
              <a href="{{route('township.create')}}" class="btn btn-info float-right">Add New</a>
          
            <table class="table py-5 table-bordered my-5" id="sampleTable">
              <thead >
                <tr>
                  <th>No</th>
                  <th>Codeno</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @php $i=1 @endphp

                @foreach($township as $town)
              	<tr>
                  <td>{{$i++}}</td>
                  <td>{{$town->codeno}}</td>
                  <td>{{$town->name}}</td>
                  <td>{{$town->price}}</td>
                	<td>
                  		<a href="{{route('township.edit',$town->id)}}" class="btn btn-success">Edit</a>
                  		
                  		<form method="post" action="{{route('township.destroy',$town->id)}}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
                  			@csrf
                  			@method('DELETE')
                    		<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
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