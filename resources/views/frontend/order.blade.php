@extends('frontend.frontend_template')
@section('content')
	<div class="jumbotron jumbotron-fluid subtitle bg-info" >
		<div class="container ">
			<h1 class="text-center">Order</h1>
		</div>
	</div>


	<div class="container-fluid">
		<div class="row mx-5">
			<div class="col-12 col-md-4 col-sm-4 col-lg-4">
				<form method="" action="" class="add_way">
					@csrf					
					<div class="form-group">
						<label for="receiver_name" class="col-sm-12 col-form-label">Receiver Name</label>
						<div class="col-sm-12">
							<input id="receiver_name" type="text" class="form-control @error('receiver_name') is-invalid @enderror" name="receiver_name" value="{{ old('receiver_name') }}" required autocomplete="receiver_name" autofocus>
							@error('receiver_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="receiver_phone" class="col-sm-4 col-form-label">Phone</label>
						<div class="col-sm-12">
							<input id="receiver_phone" type="number" class="form-control @error('receiver_phone') is-invalid @enderror" name="receiver_phone" value="{{ old('receiver_phone') }}" required autocomplete="receiver_phone" autofocus>
							@error('receiver_phone')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>					
					<div class="form-group">
						<label for="receiver_address" class="col-sm-12 col-form-label">Address</label>
						<div class="col-sm-12">
							<textarea id="receiver_address" type="text" class="form-control @error('receiver_address') is-invalid @enderror" name="receiver_address" required autocomplete="receiver_address">{{ old('receiver_address') }}</textarea>
							@error('receiver_address')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="township_id" class="col-sm-12 col-form-label"> Township </label>
						<div class="col-sm-12">
							<select class="custom-select @error('township') is-invalid @enderror receiver_township" id="township_id" name="township">
								<option selected hidden value="">Choose Township</option>
								@foreach($townships as $row)
								<option value={{$row->id}}>{{$row->name}}</option>
								@endforeach
							</select>
							@error('township')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="item_name" class="col-sm-12 col-form-label">Item Name</label>
						<div class="col-sm-12">
							<input id="item_name" type="text" class="form-control @error('item_name') is-invalid @enderror" name="item_name" value="{{ old('item_name') }}" required autocomplete="item_name" autofocus>

							@error('item_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="item_weight" class="col-sm-5 col-form-label">Item Weight <small>( kg )</small></label>
						<div class="col-sm-12">
							<input id="item_weight" type="number" class="form-control @error('item_weight') is-invalid @enderror" name="item_weight" value="{{ old('item_weight') }}" required autocomplete="item_weight" autofocus>
							@error('item_weight')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>		
					<div class="form-group row mt-5">
						<div class="col-sm-12 text-right mr-3">
							<button type="submit" class="btn btn-success">
								Add Way
							</button>
						</div>
					</div>		
				</form>
			</div>
			<div class="col-12 col-md-8 col-sm-8 col-lg-8 pl-5">
				<div class="container">
					<div class="row">
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Receiver Name</th>
										<th>Address</th>
										<th>Price</th>
										<th>Item Name</th>
										<th>Item Weight</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody id="tbody">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-8 col-md-8 container">
				<form method="" action="" class="orderform">
					@csrf				
					<div class="form-group">
						<label class="mr-5" for="payment_type">Payment Type:</label>
						<div class="form-check form-check-inline">	
							<input class="form-check-input" type="radio" name="payment" id="payment_type1" value="kbz">
							<label class="form-check-label" for="payment_type1">KBZpay</label>
						</div>
						<div class="form-check form-check-inline">  				
							<input class="form-check-input" type="radio" name="payment" id="payment_type2" value="wave">
							<label class="form-check-label" for="payment_type2">WaveMoney</label>
						</div>
						<div class="form-check form-check-inline">  				
							<input class="form-check-input" type="radio" name="payment" id="payment_type3" value="okdoller">
							<label class="form-check-label" for="payment_type3">OKdoller</label>
						</div>
					</div>
					<div class="form-group">
						<textarea id="notes" rows="3" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" required placeholder="Notes....">{{ old('notes') }}</textarea>
						<input type="hidden" name="order" value="" id="ls">
						@error('notes')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary mainfullbtncolor px-5 py-3">Order</button>
					</div>
				</form>
			</div>
		</div>		
	</div>


	
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var t_ship = {name:'',price:''};
            $('.receiver_township').change(function(){
            	// alert($('#township_id').val());
                var township_id = $('#township_id').val();
                $.post("{{route('addway')}}", {township:township_id}, function(response){
                    // alert(response);  
                    if(response.length > 0){
                    	t_ship = response[0];
                    }               
                    console.log(t_ship);
                })
            });

            $('.add_way').submit(function(e){
                var receiver_name = $('#receiver_name').val();
                var receiver_phone = $('#receiver_phone').val();
				var receiver_address = $('#receiver_address').val();
				var township_id = $('#township_id').val();
				var item_name = $('#item_name').val();
				var item_weight = $('#item_weight').val();

				var price = t_ship.price ;
				$total = 0;
				if(item_weight > 3){
					total = parseInt(price) + ((parseFloat(item_weight) - 3) * 500);
				}else{
					total = price;
				}
				

				var way = {
					receiver_name :receiver_name,
					receiver_phone :receiver_phone,
					receiver_address :receiver_address,
					township_id :township_id,
					township_name :t_ship.name,
					item_name :item_name,
					item_weight :item_weight,
					price : total
				}
                var way_arr;
				var way_list = localStorage.getItem('ways');
				if(way_list == null){
					way_arr = [];
				}else{
					way_arr = JSON.parse(way_list);
				}
				way_arr.push(way);

				var way_string = JSON.stringify(way_arr);
				localStorage.setItem('ways',way_string);
				getdata();
				// location.href="/";
				e.preventDefault();
            })      

            function getdata(){
				var way_arr,html="",total = 0;
				var way_list = localStorage.getItem('ways');
				if(way_list == null){
					way_arr = [];
				}else{
					way_arr = JSON.parse(way_list);
				}

				$.each(way_arr,function(index,value){
					html+=`
					<tr>
						<td>${index+1}</td>
						<td>${value.receiver_name}</td>	
						<td><p>${value.receiver_phone}</p><p>${value.receiver_address}</p></td>
						<td><p>${value.township_name}</p><p>${value.price} MMK</p></td>	
						<td>${value.item_name}</td>	
						<td>${value.item_weight}</td>
						<td class="text-center">
							<i class="fa fa-times-circle text-danger btn btn_remove" style="font-size: 25px !important;" data-id="${index}"></i>
							<i class="fa fa-pencil-square text-danger btn btn_edit" style="font-size: 25px !important;" data-id="${index}"></i>
						</td>						
					</tr>
					`;
					total+= value.price;
				})

				html+= `<tr><td colspan="6" class="text-center">Total</td><td>${total}</td></tr>`;

				$("#tbody").html(html);
			}  

			$("#tbody").on('click','.btn_remove',function(){
				var id = $(this).data('id');
				var way_list = localStorage.getItem('ways');
				var way_arr = JSON.parse(way_list);
				way_arr.splice(id,1);

				var arr_string = JSON.stringify(way_arr);
				localStorage.setItem('ways',arr_string);

				getdata();
			})

		$("#tbody").on('click','.btn_edit',function(){
			// alert("edit");
				var id = $(this).data('id');
				console.log('id');
				// var item_list = localStorage.getItem('items');
				// var item_arr = JSON.parse(item_list);
				// item_arr[id].qty++;

				// var arr_string = JSON.stringify(item_arr);
				// localStorage.setItem('items',arr_string);

				// getdata();
				// count();
			})

		$('.orderform').submit(function(e){
			// alert("click form");
          let notes = $('#notes').val();
          if (notes === "") {
            return true;
          }else{
          	let payment = $("input[name='payment']:checked").val();
            let way = localStorage.getItem('ways'); // JSON String
            $.post("{{route('orderstore')}}",{way:way,payment:payment,notes:notes},function (response) {
            	alert(response.msg);
              	localStorage.clear();
              	location.href="/";
            })
            e.preventDefault();
          }
        })
        // Using Form
        $('#ls').val(localStorage.getItem('ways'));
        })  
    </script>    
@endsection    