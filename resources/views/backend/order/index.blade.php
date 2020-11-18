@extends('backend.backend_template')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Order Lists</h1>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending</a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Confirm & Pair</a>
                      </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table mt-3 table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Orderno</th>
                                        <th>Orderdate</th>                             
                                        <th>Customer Name</th>
                                        <th>Totalamount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                    $i=1;
                                    @endphp
                                    @foreach($order_pending as $row)                                       
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$row->order_no}}</td>
                                            <td>{{$row->order_date}}</td>
                                            <td>{{$row->customer->user->name}}</td>
                                            @php 
                                                $total = 0;
                                            @endphp
                                            @foreach($row->ways as $w_row)
                                                   @php $total+= $w_row->pivot->total_amount; @endphp
                                            @endforeach
                                            <td>{{$total}}</td>
                                            <td>
                                                <a href="{{route('order.show',$row->id)}}" class="btn btn-primary">Detail</a>
                                                <form method="post" action="{{route('order.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to Delete?')" class="d-inline-block">
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
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table mt-3 table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Orderno</th>
                                        <th>Confirm date</th>
                                        <th>Customer Name</th>
                                        <th>Deliver Name</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                    $i=1;
                                    @endphp
                                    @foreach($order_confirm as $row)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$row->order_no}}</td>
                                            @foreach($row->delivers as $del)
                                                    <td>{{$del->pivot->date}}</td>
                                                    <td>{{$row->customer->user->name}}</td>
                                                    <td>
                                                      {{$del->user->name}}
                                                    </td>    
                                            @endforeach                                      
                                            @php 
                                                $total = 0;
                                            @endphp
                                            @foreach($row->ways as $w_row)
                                                   @php $total+= $w_row->pivot->total_amount; @endphp
                                            @endforeach
                                            <td>{{$total}}</td>
                                            <td><a href="#" class="btn btn-primary">Process</a></td>
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
	$('#sampleTable').DataTable();
</script>

@endsection