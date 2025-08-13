<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Главная страница</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/skillhunt/css/style.css') }}">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid px-md-4	">
	      <a class="navbar-brand" href="index.html">Skillhunt</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="/portal/public/contact" class="nav-link">Контакты</a></li>
                  <li class="nav-item cta cta-colored"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">Выход</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                  </li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap img" style="background-image: url('{{ asset('assets/skillhunt/images/bg_1.jpg') }}');">
      <div class="overlay"></div>
      <div class="container">
      	<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
	        <div class="col-md-10 d-flex align-items-center ftco-animate">
	        	<div class="text text-center pt-5 mt-md-5">
                            <p class="mb-4">Вы вошли в систему как <b>{{ $email }}</b></p>
	            <h1 class="mb-5">Выберите нужный раздел для работы</h1>
							<div class="ftco-counter ftco-no-pt ftco-no-pb">
			        	<div class="row">
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-worldwide"></span>
				              	</div>
				              	<div class="desc text-left">
                                                    <strong class="number" data-number="100">0</strong>
					                <span>Загрузка модулей</span>
				                </div>
				              </div>
				            </div>
				          </div>
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-visitor"></span>
				              	</div>
				              	<div class="desc text-left">
					                <strong class="number" data-number="450">0</strong>
					                <span>Companies</span>
					              </div>
				              </div>
				            </div>
				          </div>
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-resume"></span>
				              	</div>
				              	<div class="desc text-left">
					                <strong class="number" data-number="80000">0</strong>
					                <span>Active Employees</span>
					              </div>
				              </div>
				            </div>
				          </div>
				        </div>
			        </div>
							
	          </div>
	        </div>
	    	</div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="category-wrap">
    					<div class="row no-gutters">
    						<div class="col-md-2">
    							<div class="top-category text-center no-border-left">
    								<h3><a href="{{ route('delo-out')}}">Дело</a></h3>
    								<span class="icon flaticon-contact"></span>
    								<p><span class="number"></span> <span>Модуль готов к работе</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center active">
    								<h3><a href="#">Коммуналка</a></h3>
    								<span class="icon flaticon-accounting"></span>
    								<p><span class="number"></span> <span>Модуль в разработке</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">ОФС 2026</a></h3>
    								<span class="icon flaticon-accounting"></span>
    								<p><span class="number"></span> <span>Модуль в разработке</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">Архив ОФС</a></h3>
    								<span class="icon flaticon-accounting"></span>
    								<p><span class="number"></span> <span>Модуль в разработке</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">Администратор</a></h3>
    								<span class="icon flaticon-contact"></span>
    								<p><span class="number"></span> <span>Модуль в разработке</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">Разработка</a></h3>
    								<span class="icon flaticon-contact"></span>
    								<p><span class="number"></span> <span>Open position</span></p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-0">Модули</h2>
          </div>
        </div>
    	</div>
    </section>



    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  &copy;<script>document.write(new Date().getFullYear());</script> Финансово-экономическое управление </a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('assets/skillhunt/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/aos.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('assets/skillhunt/js/google-map.js') }}"></script>
  <script src="{{ asset('assets/skillhunt/js/main.js') }}"></script>
    
  </body>
</html>
