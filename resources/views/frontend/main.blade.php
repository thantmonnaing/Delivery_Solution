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
										<label >Keywords</label>
										<input class="form-control" placeholder="" type="text" name="">
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
										<label >Category</label>
										<select class="form-control" name="Any">
											<option>Any</option>
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
										</select>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
										<label >Min Price</label>
										<input class="form-control" placeholder="00.0" type="text" name="00.0">
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
										<label >Duration</label>
										<input class="form-control" placeholder="Any" type="text" name="Any">
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
										<label >Date</label>
										<input class="form-control" placeholder="Any" type="date" name="Any">
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
										<label >Max Price</label>
										<input class="form-control" placeholder="00.0" type="text" name="00.0">
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<a href="#">search</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div id="contact" class="footer">
			<div class="container">
				<div class="row pdn-top-30">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<ul class="location_icon">
							<li> <a href="#"><img src="{{asset('frontend_asset/icon/facebook.png')}}"></a></li>
							<li> <a href="#"><img src="{{asset('frontend_asset/icon/Twitter.png')}}"></a></li>
							<li> <a href="#"><img src="{{asset('frontend_asset/icon/linkedin.png')}}"></a></li>
							<li> <a href="#"><img src="{{asset('frontend_asset/icon/instagram.png')}}"></a></li>
						</ul>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="Follow">
							<h3>CONTACT US</h3>
							<span>123 Second Street Fifth <br>Avenue,<br>
								Manhattan, New York<br>
							+987 654 3210</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="Follow">
							<h3>ADDITIONAL LINKS</h3>
							<ul class="link">
								<li> <a href="#">About us</a></li>
								<li> <a href="#">Terms and conditions</a></li>
								<li> <a href="#"> Privacy policy</a></li>
								<li> <a href="#">News</a></li>
								<li> <a href="#"> Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
						<div class="Follow">
							<h3> Contact</h3>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<input class="Newsletter" placeholder="Name" type="text">
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<input class="Newsletter" placeholder="Email" type="text">
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<textarea class="textarea" placeholder="comment" type="text">Comment</textarea>
								</div>
							</div>
							<button class="Subscribe">Submit</button>
						</div>
					</div>
				</div>
				<div class="copyright">
					<div class="container">
						<p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer> 
</section>
@endsection