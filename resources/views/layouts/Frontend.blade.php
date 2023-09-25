<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pathiri Resturent | @yield('title')</title>
	<link rel="shortcut icon" type="image/png" href="{{asset('/admin/images/fav.png')}}">
	<link  rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="{{asset('/frontend/css/common.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/pathiri.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<style>
        /* Style the input field */
        input[type="date"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none; /* Remove the default outline */
        }

        /* Style the arrow button (not supported in all browsers) */
        input[type="date"]::-webkit-calendar-picker-indicator {
            background-color: #fff;
            padding: 0.2em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="time"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none; /* Remove the default outline */
        }

        /* Style the arrow button (not supported in all browsers) */
        input[type="time"]::-webkit-calendar-picker-indicator {
            background-color: #fff;
            padding: 0.2em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
<body>
		<div class="container-main">
			<div class="headers">
				<div class="logo-navbar">
					<a href="/"><img class="logo-nav" src="{{asset('/frontend/images/Millennium_logo.png')}}" alt="" style="width:120px;"></a>
				</div>
				<div class="item-navs">
					<ul class="mb-0">
						<li class="text-white item-nav"><a href="/">Home</a></li>
						<li class="text-white item-nav"><a href="/about">About Us</a></li>
						<li class="text-white item-nav"><a href="/menu">Menu</a></li>
						<li class="text-white item-nav"><a href="/gallery">Gallery</a></li>
						<li class="text-white item-nav"><a href="/contact">Contact Us</a></li>
						<a href="#" class="btn btn-menu text-white primary-bg" data-toggle="modal" data-target="#loginModal">Book a Table</a>
						<li class="text-white item-nav primary-bg location-btn" data-toggle="modal" data-target="#loginModalselect"><i class="ri-map-pin-line"></i> You are in</li>
						<div class="menulogo d-md-block d-lg-none" onclick="toggleCartt()">
							<i class="ri-menu-3-line"></i>
						</div>
					</ul>
				</div>
			</div>
		</div>
		<!-- sidebar  -->
		<div class="sidebar">
			<div class="navbar-sidebar">
				<ul>
					<li><a class="active" href="/">Home</a></li>
							<li><a class="active" href="/menu">Menu</a></li>    
							<li><a class="active" href="/about">About Us</a></li>    
							<li><a class="active" href="/gallery">Gallery</a></li>  
							<li><a class="active" href="/contact">Contact Us</a></li>  
					<a href="#" style="width: 100%;" class="btn btn-menu text-white primary-bg" data-toggle="modal" data-target="#loginModal">Book a Table</a>    
					<li class="text-white item-nav text-center primary-bg location-btns mt-3" data-toggle="modal" data-target="#loginModalselect"><i class="ri-map-pin-line"></i> You are in</li>
					<!-- <a href="#" style="width: 100%;" class="btn explore-btn-banner text-white mt-3" data-toggle="modal" data-target="#loginModalselect">Select Resturent</a> -->
				</ul>
			</div>
			<div class="d-inline closse" onclick="toggleCartt()"><i class="ri-close-circle-line"></i></div>
		</div>



	@yield('contents')


<!-- modal  -->
<div style="z-index: 1200;"  class="modal fade modal-home modal-menu" id="loginModalselect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="padding: 0px;" role="document">
		<div style="background: #000000 ;width: 100%;border-radius: 10px;margin: auto;padding: 10px;" class="modal-content login-modal-home-p">
			<i class="ri-close-circle-line close" data-dismiss="modal" aria-label="Close"></i>
			<div class="modal-body modal-loginform pt-0">
				<div class="form-menu-table">
					<h3 class="text-white choose-rst mb-0" style="display: flex;align-items: center;"><i style="margin-right: 10px;" class="ri-map-pin-2-line"></i> You are in</h3>
					<div class="img-select">
						@php
						$rest=DB::table('shops')->orderBy('id','ASC')->get();
						@endphp
						@foreach($rest as $rt)
						@if($rt->id==1)
						<div class="image-container" id="image1-container" style="cursor:pointer;" onclick="window.location.href='/'">
							<img id="image1" src="{{asset('uploads/shop/'.$rt->profile_image)}}" alt="Image 1">
							<div class="checkmark"><i class="ri-check-double-line text-white"></i></div>
							<div class="overlays"></div>
							<h4 class="rest-name text-white text-center mb-0">{{$rt->shop_name}}</h4>
							<p class="sub-addrss mb-0">{{$rt->address}}</p>
						</div>
						@else
						<div class="image-container" id="image1-container" style="cursor:pointer;" onclick="window.location.href='/restaurents'">
							<img id="image1" src="{{asset('uploads/shop/'.$rt->profile_image)}}" alt="Image 1">
							<div class="checkmark"><i class="ri-check-double-line text-white"></i></div>
							<h4 class="rest-name text-white text-center mb-0">{{$rt->shop_name}}</h4>
							<p class="sub-addrss mb-0">{{$rt->address}}</p>
						</div>
						@endif
						@endforeach
						
					</div>
					<!-- <a href="" type="submit" class="btn explore-btn-banner text-white mt-4">Submit</a> -->
				</div>
			</div>
		</div>                                    
	</div>              
</div>
<!-- modal end  -->

!-- modal  -->
	<div style="z-index: 1200;"  class="modal fade modal-home modal-menu" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" style="padding: 0px;" role="document">
			<div style="background: #000000 ;width: 100%;border-radius: 10px;margin: auto;padding: 10px;" class="modal-content login-modal-home-p">
				<i class="ri-close-circle-line close" data-dismiss="modal" aria-label="Close"></i>
				<div class="modal-body modal-loginform pt-0">
					<div class="form-menu-table">
						<form>
							<div class="form-group">
								<input type="email" class="form-control" id="bname" aria-describedby="emailHelp" placeholder="Your Name">
							</div>
						</form>
						<form>
							<div class="form-group">
								<input type="number" class="form-control" id="bmobile" aria-describedby="emailHelp" placeholder="Your Phone">
							</div>
						</form>
						<form>
							<div class="form-group">
								<input type="email" class="form-control" id="bmail" aria-describedby="emailHelp" placeholder="Your Mail Id">
							</div>
						</form>
						<form>
							<div class="form-group">
								<input type="number" class="form-control" id="bperson" aria-describedby="emailHelp" placeholder="No.of Persons">
							</div>
						</form>
						<form>
							<div class="form-group">
								<input class="date" type="date" id="bdate" min="{{date('Y-m-d')}}">
							</div>
						</form>
						<form>
							<div class="form-group">
								<input type="time" class="form-control" id="btime" aria-describedby="emailHelp" placeholder="Time">
							</div>
						</form>

						<form>
							<div class="form-group">
								
								<textarea class="form-control" id="bnote" placeholder="Please write something..."></textarea>
							</div>
						</form>
						<a type="button" style="width: max-content;" class="btn explore-btn-banner text-white" onclick="Bsubmit()" id="ab1">Book Table</a>
						<a type="button" id="ab2" style="width: max-content;" class="btn explore-btn-banner text-white"><i class="fa fa-spinner fa-spin"></i>  Book Table</a>
					</div>
				</div>
			</div>                                    
		</div>              
	</div>
	<!-- modal end  -->


		<footer>
			<div class="container-main mt-5">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="footer-main-box">
							<img class="logo-footer" src="{{asset('/frontend/images/Millennium_logo.png')}}" alt="" style="width:150px;">
							<p class="txt-footer mb-0 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget rhoncus consectetur enim.</p>
							<div class="footer-icon">
								<i class="ri-facebook-fill"></i>
								<i class="ri-instagram-fill"></i>
								<i class="ri-twitter-fill"></i>
								<i class="ri-linkedin-fill"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-main-box">
							<h3 class="mb-0 text-white footer-head">Use Full Link</h3>
							<ul>
								<li class="mb-0 footer-list"><a href="/contact" style="color:white;">Contact Us</a></li>
								<li class="mb-0 footer-list"><a href="/menu" style="color:white;">Menu</a></li>
								<li class="mb-0 footer-list"><a href="/about" style="color:white;">About Us</a></li>
								<li class="mb-0 footer-list"><a href="/gallery" style="color:white;">Gallery</a></li>
								<li class="mb-0 footer-list"><a href="/" style="color:white;">Home</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-main-box">
							<h3 class="mb-0 text-white footer-head">Contact Us</h3>
							<ul>
								@php
						$rest1=DB::table('shops')->where('id',1)->first();
						@endphp
								<li class="mb-0 footer-list">{{$rest1->mobile}}</li>
								<li class="mb-0 footer-list"> {{$rest1->mail_id}}</li>
								<li class="mb-0 footer-list">{{$rest1->address}}</li>
							</ul>
						</div>
					</div> 
					<div class="col-lg-3 col-md-6">
						<div class="footer-main-box">
							<h3 class="mb-0 text-white footer-head">Opening Hours</h3>
							<ul>
								<li class="mb-0 footer-list">Mon - Tue09.00 am - 10.00 pm</li>
								<li class="mb-0 footer-list">Wed - Thu	10.00am - 11.00pm</li>
								<li class="mb-0 footer-list">Sat 07.00am - 08.00pm</li>
								<li class="mb-0 footer-list">Sun	9:00 am - 8 Pm</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="footer-copy mt-3">
			<p class="copy-txt mb-0 text-white text-center" >Designed And Developed By  <a target="_blank" href="https://erebsglobal.com/"> ERE Business Solutions</a></p>
		</div>
	<script src="{{asset('/frontend/js/main.js')}}"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript"  src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" ></script>
		  <script src="{{ asset('js/sweetalert.js') }}"></script>
		<script>

		function checkCookie(cookieName) {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.startsWith(cookieName + '=')) {
            return true; // Cookie exists
        }
    }
    return false; // Cookie does not exist
}

$(document).ready(function() {
	$('#ab2').hide();

	$(".slider").slick({
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 1,
					speed: 100,
					autoplaySpeed: 2000,
					infinite: true,
					autoplay: true,
					centerMode: true,
					centerPadding: "0",
					arrows : false,
					responsive: [
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
				}
			}
		]
				});


    // Check if the modal should be displayed
    if (!checkCookie('modalDisplayed')) {
        // Display the modal
        $('#loginModalselect').modal('show');

        // Calculate the expiration time (60 minutes from now)
        var expirationDate = new Date();
        expirationDate.setTime(expirationDate.getTime() + 60 * 60 * 1000); // 60 minutes in milliseconds

        // Set a cookie to remember that the modal has been displayed with a 60-minute expiration time
        document.cookie = 'modalDisplayed=true; expires=' + expirationDate.toUTCString() + '; path=/';
    }
});


 
 function Bsubmit()
{
    var bname=$('input#bname').val();
    if(bname=='')
    {
        $('#bname').focus();
        $('#bname').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#bname').css({'border':'1px solid #CCC'});

	var bmobile=$('input#bmobile').val();
    if(bmobile=='')
    {
        $('#bmobile').focus();
        $('#bmobile').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#bmobile').css({'border':'1px solid #CCC'});


    var bmail=$('input#bmail').val();
   
   var bperson=$('input#bperson').val();
    if(bperson=='')
    {
        $('#bperson').focus();
        $('#bperson').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#bperson').css({'border':'1px solid #CCC'});

 var bdate=$('input#bdate').val();
    if(bdate=='')
    {
        $('#bdate').focus();
        $('#bdate').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#bdate').css({'border':'1px solid #CCC'});

 var btime=$('input#btime').val();
    if(btime=='')
    {
        $('#btime').focus();
        $('#btime').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#btime').css({'border':'1px solid #CCC'});

 var bnote=$('#bnote').val();
 

      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();


   data.append('bname', bname);
   data.append('bmobile', bmobile);
   data.append('bmail', bmail);
   data.append('bperson', bperson);
   data.append('bdate', bdate);
   data.append('btime', btime);
   data.append('bnote', bnote);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/book-table",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
    $('#ab2').hide();
    $('#ab1').show();
            swal({
                              title: "Table booked successfully.",
                             // text: "This member moved and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href=window.location.href;
                                  } 

                            });
                            
  }
  else
  {
        $('#ab2').hide();
        $('#ab1').show();
                 swal({
                              title: "No slote available",
                             // text: "This member moved and Password send to your Email",
                              icon: "error",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      
  }


}




})



}


		
		</script>
	</body>
</html>