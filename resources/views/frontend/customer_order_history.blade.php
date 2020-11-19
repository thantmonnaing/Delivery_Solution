@extends('frontend.frontend_template')
@section('content')
<main class="app-content">
	<div class="row mx-5">
        <div class="col-md-12">
            <div class="tile">
                <div class="table-responsive">
                    <table class="table mt-3 table-bordered">
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
                              @if()
                              <td><a href="#" class="tex-decoration-none">Pending</a></td>
                              @else

                              @endif
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
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