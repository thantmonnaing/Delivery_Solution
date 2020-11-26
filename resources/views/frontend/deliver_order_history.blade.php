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
                                <th>Remark</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $i=1;
                            @endphp
                            @foreach($order_confirm as $row)
                                @foreach($row->delivers as $del)
                                    @if($row->status != 0 && $del->pivot->deliver_id == Auth::user()->deliver->id)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->order_no}}</td>
                                        
                                            <td>{{$del->pivot->date}}</td>
                                            <td>{{$row->customer->user->name}}</td>
                                            <td>{{$del->user->name}}</td>
                                            <td>{{$row->notes}}</td>    
                                                                              
                                        @php 
                                        $total = 0;
                                        @endphp
                                        @foreach($row->ways as $w_row)
                                        @php $total+= $w_row->pivot->total_amount; @endphp
                                        @endforeach
                                            <td>{{$total}}</td>
                                        @if($row->status == 1)
                                            <td>
                                                <a href="#" class="text-success mr-3 done" data-id="{{$row->id}}">Done</a>
                                                <a href="{{route('order.way',$row->id)}}" class="text-info">Way</a>                             
                                            </td>
                                        @elseif($row->status == 3)
                                            <td><a href="#" class="tex-decoration-none text-success">Success</a></td>  
                                        @endif
                                    </tr>
                                    @endif
                                @endforeach
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

    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("td").on('click','.done',function(){
                var id = $(this).data('id');
                $.post("{{route('order.done')}}", {id:id}, function(response){   
                    // alert(response);       
                    if(response){
                        location.href="/deliverhistory";
                    }               
                })
            });
        })
    </script>

@endsection