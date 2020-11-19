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
        </div>
    </div>
</main>
@endsection