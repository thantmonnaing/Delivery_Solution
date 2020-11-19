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
                                @if(count($row->delivers) > 0)
                                @foreach($row->delivers as $del)
                                    <td>{{$del->pivot->date}}</td>
                                    <td>{{$row->customer->user->name}}</td>
                                    <td>
                                        {{$del->user->name}}
                                    </td>    
                                @endforeach
                                @else
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                @endif                                      
                                @php 
                                $total = 0;
                                @endphp
                                @foreach($row->ways as $w_row)
                                @php $total+= $w_row->pivot->total_amount; @endphp
                                @endforeach
                                    <td>{{$total}}</td>
                                @if($row->status == 0)
                                    <td><a href="#" class="tex-decoration-none text-warning">Pending</a></td>
                                @elseif($row->status == 3)
                                    <td><a href="#" class="tex-decoration-none text-success">Success</a></td>
                                @else
                                    <td><a href="#" class="tex-decoration-none text-info">Confirm</a></td>
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