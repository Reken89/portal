<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Исходящая почта</title>
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


      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="/portal/public/home" class="nav-link">Главная</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Входящая почта</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Справочники</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Корреспонденты</a></li>
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
          	<p class="breadcrumbs mb-0"><span class="mr-3"></span> <span>Вы вошли как {{ $info['email'] }}</span></p>
            <h1 class="mb-3 bread">Исходящая почта</h1>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
		<form action="#" id="document" method="post" class="p-5 bg-white">
              <input type='hidden' name='author' value='{{ $info['author'] }}'>   
              <input type='hidden' name='variant' value='{{ $info['variant'] }}'>  
                                 
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Вид документа</label>
                  <div class="form-group">
                        <div class="form-field">
                            <div class="select-wrap">
                              <select name="npa" class="form-control">
                                  @foreach ($info['npa'] as $value) 
                                    <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                   </div>
                </div>
              </div>       
                                 
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Корреспондент</label>
                  <div class="form-group">
                        <div class="form-field">
                            <div class="select-wrap">
                              <select name="corr" class="form-control">
                                  @foreach ($info['corr'] as $value) 
                                      <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                   </div>
                </div>
              </div>                     



              <div class="row form-group">
                <div class="col-md-12"><h3>Описание</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea name="content" class="form-control" cols="30" rows="5"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button class="btn btn-primary  py-2 px-5" id='btn_add' type="button">Добавить</button>
                </div>
              </div>

            </form>
          </div>                  

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Информация:</h3>
              <p class="mb-0 font-weight-bold">Номер и дата проставляются автоматически</p>

            </div>
          </div>
            

      <div class="container">
        <div class="row">       
          <div class="col-md-12 col-lg-8 mb-5">
 
                  @foreach ($info['documents'] as $value) 
                  @php
                      $correspondent = mb_substr($value['correspondent']['title'], 0, 40, "UTF-8");
                  @endphp
                  <div class="col-md-12 ftco-animate">
                    <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                      <div class="one-third mb-4 mb-md-0">
                        <div class="job-post-item-header align-items-center">
                                <span class="subadge">№ {{ $value['number'] }} ({{ $value['npa']['title'] }})</span>
                                <p><b>{{ $correspondent }}</b></p>
                          <p class="mb-4">{{ $value['content'] }}</p>
                        </div>
                        <div class="job-post-item-body d-block d-md-flex">
                          <div class="mr-3"><span class="icon-layers"></span> <a href="#">{{ $value['date'] }}</a></div>
                          <div><span class="icon-my_location"></span> <span>{{ $value['user']['name'] }}</span></div>
                        </div>
                      </div>

                      <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                   
                        <a href="job-single.html" class="btn btn-primary py-2">Изменить</a>
                      </div>
                    </div>
                  </div><!-- end -->  
                  @endforeach
                  
          </div>                  
        </div>
      </div>

            
            
        </div>
      </div>
    </section>









<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Модуль "Делопроизводство"</h2>
              <p>Модуль разработан для финансово-экономического управления</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">

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
