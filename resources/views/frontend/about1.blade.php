@extends('layouts.Frontend1')
@section('title')
 About
  @endsection
@section('contents')
		<!-- banner main  end -->
		<div class="about-main-box-page">
			<div class="container-main">
				<div class="row">
					<div class="col-lg-6">
						<div class="about-page-dv cake-dv">
							<img src="{{asset('/frontend/images/cake.jpg')}}" alt="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-page-dv">
							<h3 class="story-txt-about mb-0 primary-color">Story About Us</h3>
							<h1 class="mb-0 txt-about-flavour">That Flavors Within Wines.</h1>
							<p class="mb-0 txt-about-small-lorem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo At vero eos et accusamus, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattisSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem</p>
							<div class="features-about">
								<div class="specialist-dv">
									<h2 class="mb-0 spcl-txt text-white">Speciallst</h2>
									<p class="mb-0 spcl-txt-sml">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								</div>
								<div class="specialist-dv">
									<h2 class="mb-0 spcl-txt text-white">Restaurant</h2>
									<p class="mb-0 spcl-txt-sml">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								</div>
							</div>
							<a href="/menu" class="btn read-more-btn text-white">View Our Menu</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- video section  -->
		<div class="container-main">
			<div class="row">
				<div class="col-lg-12">
					<div class="video-dv">
						<!-- <iframe width="" height="450" src="https://www.youtube.com/embed/5-nhnZEBkgI?si=id6aTTzDflwzI1Nc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
						@php print_r($vid->link) @endphp
					</div>
				</div>
			</div>
		</div>
		<!-- video section end  -->
		<!-- testimonial section  -->
		<div class="container-main bg-padding" style="background-image: url('./frontend/images/bg-img.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">
			<div class="row">


				@foreach($testi as $ts)
				<div class="col-lg-6 testimonial">
					<div class="testimonial-dv">
						<div class="box-testimonial">
							<i class="ri-double-quotes-r quote"></i>
							<h3 class="testimonial-name mb-0 text-white">{{$ts->name}} </h3>
							<h4 class="testimonial-name-sub mb-0  primary-color">{{$ts->designation}}</h4>
							<p class="text-white mb-0 review-testi">{{$ts->msg}}</p>
							<div class="review-star-dv">
								@for($i=1;$i<=$ts->star;$i++)
								<i class="ri-star-fill"></i>
								@endfor
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
				
				
				<div class="col-lg-6">
					<div class="testimonial-dv">
						
					</div>
				</div>
			</div>
		</div>
		<!-- testimonial end  -->
		@endsection