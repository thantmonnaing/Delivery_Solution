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
                        <div class="col-6">
                            <h5 class="mb-4">Date:
                                {{$order->order_date}}
                            </h5>
                            <h6 class="mb-4">
                                Invoice #{{$order->order_no}}
                            </h6>
                        </div>
                        <div class="col-6 text-right">

                            <form method="post" action="{{route('order.show',$order->id)}}" class="d-inline-block mb-3">
                                @csrf
                                <button class="btn btn-info" type="submit">Confirm</button>
                            </form><br>
                            <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-4">From:
                            <address>
                                <strong> {{$order->customer->user->name}} 
                            </strong><br>
                            Email: {{$order->customer->user->email}} </address>
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
                    <div class="row d-print-none mt-2">

                    </div>

                </section>
            </div>
        </div>
    </div>
</main>   
@endsection

