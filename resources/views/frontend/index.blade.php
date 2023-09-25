@extends('layouts.Frontend')
@section('title')
 Gallery
  @endsection
@section('contents')

<!-- banner slider  -->
		<div id="customCarousel" class="carousel slide">
			<div class="carousel-inner">
				<div class="carousel-item active" style="background-image: url('{{$banner1->image}}');background-position: center;background-repeat: no-repeat;background-size: cover;">
					<div class="overlay overlay_2">
					<div class="container-main">
						<div class="banner-content">
							<h4 class="text-center small-text-banner primary-color">MAKE A ORDER</h4>
							<h1 class="mb-0 text-white text-center banner-main-text">{{$banner1->heading}}</h1>
							<p class="text-center text-white bottom-small-text">{{$banner1->sub_heading}}</p>
							<a href="#" class="btn explore-btn-banner text-white" data-toggle="modal" data-target="#loginModalselect"><i class="ri-map-pin-line"></i> You are in </a>
						</div>
					</div>
					</div>
				</div>
				@foreach($banner as $b)
				<div class="carousel-item" style="background-image: url('{{$b->image}}');background-position: center;background-repeat: no-repeat;background-size: cover;">
					<div class="overlay overlay_2">
					<div class="container-main">
						<div class="banner-content">
							<h4 class="text-center small-text-banner primary-color">MAKE A ORDER</h4>
							<h1 class="mb-0 text-white text-center banner-main-text">{{$b->heading}} <br> Taste of Italy</h1>
							<p class="text-center text-white bottom-small-text">{{$b->sub_heading}}</p>
							<a href="#" class="btn explore-btn-banner text-white"><i class="ri-map-pin-line"></i> You are in</a>
						</div>
					</div>
					</div>
				</div>
				@endforeach
				
			</div>
			<!-- Navigation Controls -->
			<a class="carousel-control-prev" href="#customCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#customCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- slider end  -->

		<div class="container-main">
			<div class="row">
				<div class="col-lg-6" style="margin: auto;">
					<div class="about-home-box box-about">
						<h3 class="mb-0 primary-color text-about-head-home">About Us</h3>
						<h1 class="mb-0 text-white main-txt-home-about">Discover Lorem From <br> Flavors Within Wines.</h1>
						<p class="mb-0 sub-txt-about-home">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium et consequuntur omnis sit voluptatibus deleniti id quam officia maiores adipisci?</p>
						<a href="#" class="btn read-more-btn text-white">Read More</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-home-box">
						<img class="abou-home-img" src="./frontend/images/about3.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
		<!-- end about div  -->
		<!-- services div  -->

		<div class="container-main">
			<div class="row">
				<div class="col-lg-12">
					<div class="service-head-main-dv">
						<h3 class="mb-0 service-txt-home primary-color text-center">Services</h3>
						<h1 class="mb-0 text-white text-center service-txt-home-main">Try Our Special Offer</h1>
					</div>
				</div>
			</div>
			<div class="slider">

					@foreach($offers as $o)
				<div class="item" >
					<div class="service-img-box">
						<img class="service-img" src="{{Url($o->image)}}" alt="">
					</div>
				</div>
				@endforeach
				
				
			</div>
		</div>




		<!-- services end  -->
		<!-- menu div  -->
		<div class="container-main">
			<div class="row">
				<div class="col-lg-12">
					<div class="menu-dv">
						<h4 class="text-center mb-0 menu-txt-home primary-color">From Our Menu</h4>
						<h1 class="text-center text-white mb-0 try-txt">Try Our Daily Offers</h1>
					</div>
				</div>
				@foreach($offer_products as $op)
				<div class="col-lg-6">
					<div class="menu-box">
						<div class="box-main-menu">
							<div class="left-item-box-sub">
								<div class="menu-img-dv">
									<img class="menu-item-img" src="{{asset('uploads/restaurent_items/'.$op->image)}}" alt="" style="height:100px;width:100px;">
								</div>
								<div class="item-name-dv">
									@if($op->is_recommendable=='Yes')
									<small class="tag-menu"><i class="ri-pushpin-fill"></i> Must Try</small>
									@endif
									<h3 class="menu-item-name mb-0 text-white">{{$op->item}}</h3>
									@if($op->is_offer=='Yes')
									<p class="menu-item-sub mb-0 text-white">Fresh Item Served</p>
									@endif
								</div>
							</div>
						</div>
						<div class="border-dv"></div>
						@if($op->is_offer=='Yes')
						<div class="rate-div-menu">
							<h3 class="rate mb-0">£{{$op->normal_price}}</h3>
							<h4 class="descount-price mb-0">£{{$op->offer_price}}</h4>
						</div>
						@else
						<div class="rate-div-menu">
							<h4 class="rate mb-0">£{{$op->normal_price}}</h4>
						</div>
						@endif
					</div>
				</div>
				@endforeach
				
				<div class="col-lg-12">
					<div class="btn-dv-menu">
						<a href="/menu" class="btn explore-btn-banner text-white">View Our Menu</a>
					</div>
				</div>
			</div>
		</div>
		<!-- menu div end  -->
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
		<!-- gallery div  -->
		<div class="gallery-main-box">
			<div class="container-main">
				<div class="row">

					@foreach($gal as $gl)
					<div class="col-lg-3 col-md-6">
						<div class="gallery-box">
							<img class="gallery-img" src="{{Url($gl->image)}}" alt="">
						</div>
					</div>
					@endforeach
					
					
					
				</div>
			</div>
		</div>
		<!-- gallery div end  -->
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