@extends('backend.backend_template')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Admin Lists</h1>
		</div>
        @if(Auth::user()->email == 'admin@gmail.com')
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.create')}}" class="btn btn-primary">Add Admin</a></li>
		</ul>
        @endif
	</div>
	<div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
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
                                @foreach($users as $row)
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$row->name}} </td>
                                        <td> {{$row->email}} </td>
                                        <td>
                                            <form method="post" action="{{route('customer.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to Delete?')" class="d-inline-block" id="myform">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger" @if(Auth::user()->email != 'admin@gmail.com') {{"disabled = true;"}} @endif>
                                            </form>
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
</main>
@endsection

@section('script')

<script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
	$('#sampleTable').DataTable();
</script>

@endsection