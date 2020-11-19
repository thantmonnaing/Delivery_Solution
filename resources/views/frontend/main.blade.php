@extends('frontend.frontend_template')
@section('content')
<section >
	<div class="banner-main">
		<img src="{{asset('frontend_asset/images/banner.jpg')}}" alt="#"/>
		<div class="container">
			<div class="text-bg">
				<h1>Delivery<br><strong class="white">Solution</strong></h1>
				<div class="container">
					<form class="main-form">
						<h3>Calculate Price</h3>
						<div class="row">
							<div class="col-md-9 col-12">
								<div class="row">									
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
										<label >Category</label>
										<select class="custom-select @error('township') is-invalid @enderror receiver_township" id="township_id" name="township">
											<option selected hidden value="">Choose Township</option>
											@foreach($townships as $row)
												<option value={{$row->id}}>{{$row->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
										<label >Weight</label>
										<input class="form-control" placeholder="" type="number" name="item_weight" id="item_weight">
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
										<label >Price</label>
										<input class="form-control" placeholder="" type="number" name="price" id="price" readonly>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mt-4 px-3">
								{{-- <a href="" class="search">search</a> --}}
								<button class="btn btn-success search">Search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</section>
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

            $('.search').click(function(e){
                var item_weight = $('#item_weight').val();

				var price = t_ship.price ;
				var total = 0;
				if(item_weight > 3){
					total = parseInt(price) + ((parseFloat(item_weight) - 3) * 500);
				}else{
					total = price;
				}
				$('#price').val(total);
				e.preventDefault();
            }) 
        })  
    </script>    
@endsection