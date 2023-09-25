@extends('layouts.Frontend1')
@section('title')
 Menu
  @endsection
@section('contents')
		<!-- banner main  -->
		<div class="banner-brudcumb-main" style="background-image: url('{{ asset('frontend/images/about-banner.jpg') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
			<div class="container-main">
				<div class="row">
					<div class="col-lg-12">
						<div class="banner-page-name-dv">
							<h1 class="mb-0 text-white banner-page-name-txt">Menu</h1>
							<p class="brudcumb-txt mb-0 primary-color">Home > Menu</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner main  end -->
		<!-- menu div  -->
		<div class="container-main">
			<div class="col-lg-12">
					<div class="menu-dv option-menu" style="float:right;">
					
						<form class="option-select-product" action="">
							<select name="products" id="products" onchange="SelectType(this.value)">
								<option value="All">All</option>
								<option value="Veg" @if($menu=='Veg') selected @endif>Veg</option>
								<option value="Non-Veg" @if($menu=='Non-Veg') selected @endif>Non - Veg</option>
							</select>
						</form>
					</div>
				</div>

			@foreach($cat as $c)
			@php

			$items=DB::table('restaurent_items')->where('status','Active')->where('catid',$c->id)->where('type',$menu)->get();
			@endphp

			@if(sizeOf($items))
			<div class="row">
				<div class="col-lg-12">
					<div class="menu-dv option-menu">
						<h1 class="primary-color mb-0 try-txt">{{$c->category}}</h1>
						<!-- <form class="option-select-product" action="">
							<select name="products" id="products">
								<option value="volvo">Sort By</option>
								<option value="saab">Veg</option>
								<option value="opel">Non - Veg</option>
							</select>
						</form> -->
					</div>
				</div>

				@foreach($items as $i)
					<div class="col-lg-6">
					<div class="menu-box">
						<div class="box-main-menu">
							<div class="left-item-box-sub">
								<div class="menu-img-dv">
									<img class="menu-item-img" src="{{asset('uploads/restaurent_items/'.$i->image)}}" alt="" style="height:100px;width:100px;">
								</div>
								<div class="item-name-dv">
									@if($i->is_recommendable=='Yes')
									<small class="tag-menu"><i class="ri-pushpin-fill"></i> Must Try</small>
									@endif
									<h3 class="menu-item-name mb-0 text-white">{{$i->item}}</h3>
									@if($i->is_offer=='Yes')
									<p class="menu-item-sub mb-0 text-white">Fresh Item Served</p>
									@endif
								</div>
							</div>
						</div>
						<div class="border-dv"></div>
						@if($i->is_offer=='Yes')
						<div class="rate-div-menu">
							<h3 class="rate mb-0">£{{$i->normal_price}}</h3>
							<h4 class="descount-price mb-0">£{{$i->offer_price}}</h4>
						</div>
						@else
						<div class="rate-div-menu">
							<h3 class="rate mb-0">£{{$i->normal_price}}</h3>
						</div>
						@endif
					</div>
				</div>
				@endforeach




			</div>
			@endif

@endforeach


			



		</div>
		<!-- menu div end  -->

		<script type="text/javascript">
			
			function SelectType(val)
			{
				if(val=='All')
				{
					window.location.href='/menu';
				}
				else
				{
					window.location.href='/menus/' + val;
				}
			}


		</script>



		@endsection

