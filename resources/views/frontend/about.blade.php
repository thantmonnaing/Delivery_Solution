@extends('frontend.frontend_template')
@section('content')
<section >

	{{-- Text Section	 --}}
	<div class="container">
		<div class="mt-5">
			<center><h1>Delivery Solution</h1></center>
			<p class="pt-4">With over 19 years of experience in the courier services industry, Corporate Delivery Service is able to successfully meet the courier delivery needs of the Phoenix business community. We pride ourselves in the quality of service we are able to provide to our customers. Some of our most loyal customers have been with us since the very beginning. Start using Corporate Delivery Service for all of your courier services today to experience the difference. Our full-time professional drivers can rapidly be dispatched to deliver every package in a rushed or standard delivery time. We don't use outside contracting services, so you know that every driver has been tested and is highly qualified before delivering any of your packages.

			We take the extra time to understand our customer's needs in order to provide them with a better service. We can provide your company with customized routes, expedited time-sensitive deliveries, volume discounts, and more. Give us a call today to tell us more about your company and how our services can help your business be more successful.

			Our straight-forward pricing is not only competitive, but hard to beat. Please call to learn about potential volume discounts. Arizona cities that we provide courier services to include: Phoenix, Scottsdale, Paradise Valley, Peoria, Glendale, Anthem, Buckeye, Goodyear, Tempe, Mesa, Gilbert, Chandler, Avondale, and Apache Junction. Don't see your city listed? Give us a call to find out if we are able to deliver to your city.</p><br>

			<p>An Immediate Response to your service request is our primary goal.</p>
			<hr>
			<p>Fast and easy on-line order entry available.</p>
		</div>
	</div>

{{-- Frequently Question --}}
	<div class="container">
		<div class="row mt-5">
			<div class="col-6">
				<h2>Frequently Asked Question</h2>
				<div class="accordion mt-3" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <p class="mb-0">
				        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          How much Delivery Solution compensates when<br>a parcel is lost ?
				        </button>
				      </p>
				    </div>

				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body">
				        We compensate ten times of the delivery fee for value-undeclared parcels.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <p class="mb-0">
				        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          How much does Delivery Solution charge for <br> return parcel ?
				        </button>
				      </p>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body">
				       Return fee is usually half of the delivery fee for major township and full delivery fee for other township.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <p class="mb-0">
				        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          How long does it take to sent a parcel ?
				        </button>
				      </p>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body">
				       Delivery Solution delivers parcels on business day.
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<div class="col-6 mt-5">
				<img src="frontend_asset/images/question.jpg" class="image-fluid">
			</div>
		</div>
	</div>
</section>
@endsection

