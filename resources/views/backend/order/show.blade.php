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
                            <form method="" action="" class="confirmform">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8 col-lg-8">

                                        <div class="form-group">
                                            <div class="col-sm-12 pt-3">
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
                                                <input type="hidden" name="id" id="order_id" value="{{$order->id}}">                                          
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-sm-4 col-lg-4 pt-3">
                                        <button type="submit" class="btn btn-primary mainfullbtncolor print_btn">Confirm</button>
                                    </div>
                                </div>
                            </form>                             
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-5">From :
                            <address>
                                <strong> {{$order->customer->user->name}} 
                            </strong><br>
                            Email: {{$order->customer->user->email}}<br>
                            Address: {{$order->customer->address}}<br>
                            Ph : {{$order->customer->phone}} </address>
                        </div>
                        <div class="col-7 pl-5">
                            <span id="deliver_detail"></span>
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
                    var data = response; 
                    if(data){
                        
                        html+= `
                            To :<address>
                                <strong>${data.deliver.user.name}</strong><br>
                            Email: ${data.deliver.user.email}<br>
                            Transport : ${data.deliver.transport_type}<br>
                            Ph : ${data.deliver.phone}
                             </address>
                        `;

                        $('#deliver_detail').html(html);
                    }
                })
            });


            $('.confirmform').submit(function(e){
            // alert("click form");
                var deliver_id = $('#deliver').val();
                var order_id = $('#order_id').val();
                if (deliver === "") {
                    return true;
                }else{// JSON String
                    $.post("{{route('order.confirm')}}",{deliver_id:deliver_id,order_id:order_id},function (response) {
                        // alert(response.msg);
                        $('.print_btn').hide();
                        $('#deliver').hide();
                        window.print();
                        $.toast({
                            heading: 'Success',
                            text: 'Your Invoice is successful!',
                            showHideTransition: 'slide',
                            position: 'top-center',
                            icon: 'success',
                            hideAfter: 10000,

                            afterHidden: function () {
                                location.href="/order";
                            }
                        });
                    })
                    e.preventDefault();
                }
            })
        })  
    </script>    
@endsection  

@section('script')
    <script type="text/javascript">
    </script>
@endsection

