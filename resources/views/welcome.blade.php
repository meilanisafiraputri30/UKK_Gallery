<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.creativegigstf.com/faster/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 02:29:22 GMT -->
<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Pictrest</title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="{{asset('assets/img/logo.png')}}">

		<link rel="stylesheet" href="{{ url('css/responsive.css') }}">
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <link rel="stylesheet" href="{{ url('css/welcome.css') }}">


		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
        <style>
            .prod-head {
              line-height: 0.9;
            }
          </style>

	</head>

	<body style="background-color: #113D3C">
        <header class="theme-main-header">
            <div class="container">
                <div class="menu-wrapper clearfix">
                    <div class="logo float-left fw-bold"><a class="navbar-brand font-weight-bolder ml-3 fw-bold" style="font-family: montserrat, bold; font-size: 35px;  color:#F4EDDB">Gallery Kita</a></div>
                    <ul class="button-group float-right">
                        <li><a href="{{ route('registerPage') }}" class="tran3s login">Signup</a></li>
                        <li><a href="{{ route('login') }}" class="tran3s login">LOGIN</a></li>
                    </ul>
                </div>
            </div>
        </header>
        {{-- <div class="outer">
            <div class="prod-logo">
                <div class="logo float-left fw-bold"><a class="navbar-brand font-weight-bolder ml-5 fw-bold" style="font-family: montserrat, bold; font-size: 25px;  color:#F4EDDB;">Gallery Kita</a></div>
                <ul class="prod-right">
                    <li><a href="{{ route('registerPage') }}">Signup</a></li>
                    <li><a href="{{ route('login') }}" class="tran3s login">LOGIN</a></li>
              </ul>
              <header class="theme-main-header">
                <div class="container">
                    <div class="menu-wrapper clearfix">

                        <ul class="button-group float-right">

                        </ul>
                    </div>
                </div>
            </header>
            </div> --}}
            <div class="inner">
                <div class="prod-left">
                    <h1 class="prod-head" style="font-size: 80px !important"><span style="color:#F4EDDB; margin-top:15px;">HELLO</span> GallGuys!</h1>
                    <p class="prod-head-sub" style="font-family: popins; margin-top: 20px; font-size: 23px">Unggah foto kenanganmu disini agar semua orang tau serunya kehidupanmu!!</p>
                </div>
                <div class="col-md-6 overflow-hidden">
                    <img width="1000px" src="{{ asset('assets/card-img.png') }}" style="margin-top: 50px; margin-left: 15px;" alt="">
                  </div>
                {{-- <div class="">
                    <img src="https://github.com/abhinanduN/codepen/blob/master/human-image.png?raw=true" class="prod-human-img" alt="prod"/>
                </div> --}}
            </div>
        </div>
		{{-- <div class="main-page-wrapper home-page-one"> --}}

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			{{-- <div id="loader-wrapper">
				<div id="loader"></div>
			</div> --}}



			{{-- <div class="html-top-content"> --}}
				<!--
				=============================================
					Theme Header
				==============================================
				-->
				{{-- <header class="theme-main-header">
					<div class="container">
						<div class="menu-wrapper clearfix">
							<div class="logo float-left fw-bold"><a class="navbar-brand font-weight-bolder ml-3 fw-bold" style="font-family: montserrat, bold; font-size: 25px;  color:#113D3C;">Gallery Kita</a></div>
							<ul class="button-group float-right">
								<li><a href="{{ route('registerPage') }}" class="tran3s">Signup</a></li>
                                <li><a href="{{ route('login') }}" class="tran3s login">LOGIN</a></li>
							</ul>
						</div>
					</div>
				</header> --}}


				<!--
				=====================================================
					Theme Main SLider
				=====================================================
				-->
				{{-- <div id="theme-main-banner" class="banner-one">
					<div data-src="{{asset('images/home/slide-1.jpg')}}">
						<div class="camera_caption">
							<div class="main-container">
								<div class="container">
									<h5 class="wow fadeInUp animated">#1 Cleaning App</h5>
									<h1 class="wow fadeInUp animated">Great Features with <br>B est Cleaner.</h1>
									<p class="wow fadeInUp animated">No need for a  Wi-Fi network or mobile data plan. The <br> choice of OVER 1 billion users.</p>
									<a href="course-2-column.blade.php" class="tran3s wow fadeInLeft animated button-one" data-wow-delay="0.499s"><i class="fa fa-apple" aria-hidden="true"></i>App Store</a>
									<a href="course-2-column.blade.php" class="tran3s wow fadeInRight animated button-two" data-wow-delay="0.499s"><img src="{{asset('images/icon/2.png')}}" alt="">GooglePlay</a>
									<div class="image-wrapper wow fadeInUp animated" data-wow-delay="0.75s">
										<img src="{{asset('images/home/shape-1.png')}}" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> --}}




	        <!-- Scroll Top Button -->
			{{-- <button class="scroll-top tran3s color-one-bg">
				<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
			</button> --}}


		<!-- Js File_________________________________ -->

		<!-- j Query -->
		{{-- <script type="text/javascript" src="{{asset('vendor/jquery.2.2.3.min.js')}}"></script> --}}

		<!-- Bootstrap JS -->
		{{-- <script type="text/javascript" src="{{asset('vendor/bootstrap/bootstrap.min.js')}}"></script> --}}

		<!-- Vendor js _________ -->
		<!-- Camera Slider -->
		{{-- <script type='text/javascript' src="{{asset('vendor/Camera-master/scripts/jquery.mobile.customized.min.js')}}"></script> --}}
	    {{-- <script type='text/javascript' src="{{asset('vendor/Camera-master/scripts/jquery.easing.1.3.js')}}"></script> --}}
	    {{-- <script type='text/javascript' src="{{asset('vendor/Camera-master/scripts/camera.min.js')}}"></script> --}}
	    <!-- WOW js -->
		{{-- <script type="text/javascript" src="{{asset('vendor/WOW-master/dist/wow.min.js')}}"></script> --}}
		<!-- Tilt js -->
		{{-- <script type="text/javascript" src="{{asset('vendor/tilt.js/src/tilt.jquery.js')}}"></script> --}}
		<!-- Fancybox -->
		{{-- <script type="text/javascript" src="{{asset('vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script> --}}
		<!-- Validation -->
		{{-- <script type="text/javascript" src="{{asset('vendor/contact-form/validate.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/contact-form/jquery.form.js')}}"></script> --}}

		<!-- owl.carousel -->
		{{-- <script type="text/javascript" src="{{asset('vendor/owl-carousel/owl.carousel.min.js')}}"></script> --}}

		<!-- Theme js -->
		{{-- <script type="text/javascript" src="{{asset('js/theme.js')}}"></script> --}}

		{{-- </div> --}}
        <script>
            $(".prod-logo").hover(function () {
                $(".inner").addClass("inner-hover");
                $(".nav-li").slideDown(500);
            },
            function () {
                $(".inner").removeClass("inner-hover");
            $(".nav-li").slideUp(500);
            }
            );
        </script>
	</body>

<!-- Mirrored from html.creativegigstf.com/faster/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 02:29:28 GMT -->
</html>
