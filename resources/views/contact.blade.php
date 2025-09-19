<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Контакты</title>
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
	      <a class="navbar-brand" href="">Веб-приложение</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="/portal/public/home" class="nav-link">Главная страница</a></li>
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
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/skillhunt/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <h1 class="mb-3 bread">Контактная информация</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Контакты</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Адрес </span> г. Костомукша, ул. Калевала, дом 13</p>
          </div>
          <div class="col-md-3">
            <p><span>Телефон</span> <a href="tel://89116625478">8 911 662 54 78</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:finanse@kostamail.ru">finanse@kostamail.ru</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/10935/kostomucsha/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Костомукша</a><a href="https://yandex.ru/maps/10935/kostomucsha/?ll=30.606731%2C64.582427&utm_medium=mapframe&utm_source=maps&z=18.2" style="color:#eee;font-size:12px;position:absolute;top:14px;">Костомукша — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=30.606731%2C64.582427&z=18.2" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
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