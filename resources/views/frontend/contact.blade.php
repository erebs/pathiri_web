@extends('layouts.Frontend')
@section('title')
 Contact
  @endsection
@section('contents')
		<!-- banner main  -->
		<div class="banner-brudcumb-main" style="background-image: url('{{ asset('frontend/images/about-banner.jpg') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
			<div class="container-main">
				<div class="row">
					<div class="col-lg-12">
						<div class="banner-page-name-dv">
							<h1 class="mb-0 text-white banner-page-name-txt">Contact Us</h1>
							<p class="brudcumb-txt mb-0 primary-color">Home > Contact Us</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner main  end -->
		<div class="contact-main-dv">
			<div class="container-main">
				<div class="row">

					@foreach($shops as $sp)
					<div class="col-lg-6">
						<div class="contact-box">
								<img class="location-img" src="{{asset('/frontend/images/place.png')}}" alt="">
								<h2 class="mb-0 text-white resturent-name text-center">{{$sp->shop_name}}</h2>
								<p class="loctxt mb-0 primary-color text-center">{{$sp->mobile}}</p>
								<p class="loctxt mb-0 primary-color text-center">{{$sp->address}}</p>
							</div>
					</div>
					@endforeach
					
					<div class="col-lg-6">
						<div class="contact-box">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250436.59730633686!2d75.64599554583941!3d11.256126134511012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba65938563d4747%3A0x32150641ca32ecab!2sKozhikode%2C%20Kerala!5e0!3m2!1sen!2sin!4v1695327706064!5m2!1sen!2sin" width="" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="contact-box">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250436.59730633686!2d75.64599554583941!3d11.256126134511012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba65938563d4747%3A0x32150641ca32ecab!2sKozhikode%2C%20Kerala!5e0!3m2!1sen!2sin!4v1695327706064!5m2!1sen!2sin" width="" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- form  -->
		<div class="container-main">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-box">
						<img src="{{asset('/frontend/images/form-img.jpg')}}" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-box">
						<form>
							<div class="form-group">
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name">
							</div>
						</form>
						<form>
							<div class="form-group">
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Phone">
							</div>
						</form>
						<form>
							<div class="form-group">
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
							</div>
						</form>
						<div class="form-group">
							<textarea placeholder="Message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						</div>
						<a href="#" type="submit" class="btn read-more-btn text-white">Submit</a>
					</div>
				</div>
			</div>
		</div>


@endsection