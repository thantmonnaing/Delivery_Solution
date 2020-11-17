$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
		getdata();
		// alert("OK");
		$(".add_way").click(function(){
			var id = $(this).data('id');
			var codeno = $(this).data('codeno');
			var name = $(this).data('name');
			var photo = $(this).data('photo');
			var price = $(this).data('price');
			var discount = $(this).data('discount');

			var receiver_name = $('#receiver_name').val();
			var receiver_address = $('#receiver_address').val();
			var township_id = $('#township_id').val();

			var qty = $('.qty').val();				
			var status = false;
			var item = {
				id:id,
				name:name,
				codeno:codeno,
				photo:photo,
				price:price	,
				discount:discount,
				qty:qty				
			}

				var item_arr;
				var item_list = localStorage.getItem('items');
				if(item_list == null){
					item_arr = [];
				}else{
					item_arr = JSON.parse(item_list);
				}
				$.each(item_arr,function(i,v){
					if(v.id == id){
						status = true;
					}
				})
				if(!status){
					item_arr.push(item);
				}
				var item_string = JSON.stringify(item_arr);
				localStorage.setItem('items',item_string);
				getdata();
				count();
				location.href="/";
			
		})

		$("#tbody").on('click','.btn_remove',function(){
				var id = $(this).data('id');
				var item_list = localStorage.getItem('items');
				var item_arr = JSON.parse(item_list);
				item_arr.splice(id,1);

				var arr_string = JSON.stringify(item_arr);
				localStorage.setItem('items',arr_string);

				getdata();
				count();
			})

		$("#tbody").on('click','.btn_increase',function(){
				var id = $(this).data('id');
				var item_list = localStorage.getItem('items');
				var item_arr = JSON.parse(item_list);
				item_arr[id].qty++;

				var arr_string = JSON.stringify(item_arr);
				localStorage.setItem('items',arr_string);

				getdata();
				count();

			})

			$("#tbody").on('click','.btn_decrease',function(){
				var id = $(this).data('id');
				var item_list = localStorage.getItem('items');
				var item_arr = JSON.parse(item_list);
				if(item_arr[id].qty > 1){
					item_arr[id].qty--;
				}else{
					item_arr.splice(id,1);
				}				
				
				var arr_string = JSON.stringify(item_arr);
				localStorage.setItem('items',arr_string);

				getdata();
				count();

			})

		function getdata(){
				var item_arr,html="";
				var total = 0;
				var subtotal = 0;
				var item_list = localStorage.getItem('items');
				if(item_list == null){
					item_arr = [];
				}else{
					item_arr = JSON.parse(item_list);
				}

				$.each(item_arr,function(index,value){
					var discount = '';
					total = value.price * value.qty;
					subtotal+= total;	
					if(value.discount != ''){
						discount = value.discount + 'MMK';
					}else{
						discount = value.price + 'MMK';
					}				
					html+=`
					<tr>
						<td colspan='3' class='text-center'><button class="btn btn-outline-danger btn-remove btn-sm" style="border-radius: 20%"> 
									X
								</button> </td>						
						<td><img src='${value.photo}' style='width:100px;height:100px;'></td>
						<td>${value.name}<br><br>${value.codeno}</td>						
						<td><button class="btn btn-outline-secondary btn_increase mr-5" data-id="${index}">+</button>${value.qty}<button class="btn btn-outline-secondary btn_decrease mx-5" data-id="${index}">-</button></td>
						<td><span class="text-danger">${discount}</span><br></td>
						<td>${total} MMK</td>
					</tr>
					`;
				})

				
				var s_total = 'Total : '+subtotal + 'MMK';
				$("#cart_total").html(s_total);

				$("#tbody").html(html);
			}
			
	})
				