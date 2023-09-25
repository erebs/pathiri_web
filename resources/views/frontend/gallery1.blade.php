@extends('layouts.Frontend1')
@section('title')
 Gallery
  @endsection
@section('contents')
				<!-- banner main  -->
				<div class="banner-brudcumb-main" style="background-image: url('{{ asset('frontend/images/about-banner.jpg') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
					<div class="container-main">
						<div class="row">
							<div class="col-lg-12">
								<div class="banner-page-name-dv">
									<h1 class="mb-0 text-white banner-page-name-txt">Gallery</h1>
									<p class="brudcumb-txt mb-0 primary-color">Home > Gallery</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- banner main  end -->
		<!-- gallery  -->
		<div class="gallery-dv-main">
			<div class="container-main">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="galler-box txt-box">
							<h1 class="photos-txt text-white mb-0">Our <br> <span>Photos</span></h1>
						</div>
					</div>

					@foreach($gallery as $g)
					<div class="col-lg-3 col-md-4">
						<div class="galler-box">
							<img src="{{$g->image}}" alt="">
						</div>
					</div>
					@endforeach
					
					
				</div>


				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="galler-box txt-box">
							<h1 class="photos-txt text-white mb-0">Our <br> <span>Videos</span></h1>
						</div>
					</div>

					@foreach($video as $v)
					<div class="col-lg-3 col-md-4">
						<div class="galler-box">
							@php print_r($v->link) @endphp
						</div>
					</div>
					@endforeach
					
					
				</div>
			</div>
		</div>


		@endsection