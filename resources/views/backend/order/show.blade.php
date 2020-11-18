@extends('backend.backend_template')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i>Invoice</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('order.index')}}" class="btn btn-primary">Back</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-5">
                            <h5 class="mb-4">Date:
                                {{$order->order_date}}
                            </h5>
                            <h6 class="mb-4">
                                Invoice # {{$order->order_no}}
                            </h6>
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-lg-8">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <select class="custom-select @error('deliver') is-invalid @enderror get_deliver" id="deliver" name="deliver">
                                                <option selected hidden value="">Choose Deliver</option>
                                                @foreach($delivers as $row)
                                                <option value={{$row->id}}>{{$row->user->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('deliver')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 text-right">
                                    <form method="post" action="{{route('order.show',$order->id)}}" class="d-inline-block mb-3">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Confirm</button>
                                    </form><br>
                                    <a class="btn btn-secondary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a>
                                </div>
                            </div>                            
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-4">From:
                            <address>
                                <strong> {{$order->customer->user->name}} 
                            </strong><br>
                            Email: {{$order->customer->user->email}}<br>
                            Address: {{$order->customer->address}} </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Item Name </th>
                                        <th> Item Weight </th>
                                        <th> Receiver Name </th>
                                        <th> Phone </th>
                                        <th> Address </th>
                                        <th> Township </th>
                                        <th> Total </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($order->ways as $way)
                                        <tr>
                                            <td> {{$i++}} </td>
                                            <td> {{$way->item_name}} </td>
                                            <td> {{$way->item_weight}} </td>
                                            <td> {{$way->receiver_name}} </td>
                                            <td> {{$way->phone}} </td>
                                            <td> {{$way->address}} </td>
                                            <td> {{$way->township->name}} </td>
                                            <td> {{$way->pivot->total_amount}} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
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
            $('.get_deliver').change(function(){
                var deliver = $('#deliver').val();
                var html = '';
                $.post("{{route('getdeliver')}}", {deliver_id:deliver}, function(response){
                    console.log(response);  
                    if(response !=null){
                        html+= `
                            <address>
                                <strong> {{$order->customer->user->name}} 
                            </strong><br>
                            Email: {{$order->customer->user->email}}<br>
                            Address: {{$order->customer->address}} </address>
                        `;
                    }
                })
            });
        })  
    </script>    
@endsection  

