@php
    if ($info['status'] == true){
        //var_dump($info['total']);
    }
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Бюджет 2027-2029</title>
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
        
        <!-- Plugin checkselect! -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/checkselect/checkselect.css') }}">
        <!-- The end checkselect! -->
        
        <!-- Plugin table2! -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/table/table2.css') }}">
        <!-- The end table2! -->
    </head>
    <body>        
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid px-md-4	">
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/portal/public/home" class="nav-link">Главная</a></li>
                        <li class="nav-item"><a href="/portal/public/budget/admin" class="nav-link">Таблица</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Прогноз</a></li>
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
                        <h1 class="mb-3 bread">Бюджет (архив)</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section bg-light">
            <div style="background-color: PaleTurquoise;" class="container">
                <div class="row"> 
                    <div class="col-md-12 col-lg-8 mb-5">         
                        <form action="/portal/public/budget/admin/archive" id="parameters" method="get" class="p-5 bg-white">

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Год</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="year" class="form-control">
                                                    <option value="2026">2026 год (бюджет 26-28)</option>
                                                    <option value="2027">2027 год (бюджет 26-28)</option>
                                                    <option value="2028">2028 год (бюджет 26-28)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                            
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Учреждения</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="variant" class="form-control">
                                                    <option value="1">Администрация</option>
                                                    <option value="2">ОМСУ</option>
                                                    <option value="3">ЦБ и Закупки</option>
                                                    <option value="4">Детские сады</option>
                                                    <option value="5">ДХШ и ДМШ</option>
                                                    <option value="6">ВСОШ</option>
                                                    <option value="7">КУМС</option>
                                                    <option value="8">Итог</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-primary  py-2 px-5" type="submit">Выбрать</button>
                                </div>
                            </div>
                        </form>
                    </div>                  

                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"><font color="red">Информация:</h3>
                            @if ($info['status'] == true)
                                <p class="mb-0 font-weight-bold"><font color="red">Выбранный год: {{ $info['year'] }}</p>
                                </br>
                                <a href="{{ route('budget-archive-admin-export', ['year' => $info['year'], 'variant' => $info['variant']]) }}" title="Скачать Excel">
                                    <img src="{{ asset('assets/icons/excel-48.png') }}" alt="Export" style="width: 48px; height: 48px;">
                                <font color="black">- Экспорт в xlsx</a>
                            @endif
                        </div> 
                    </div>       
                                                         
                </div>
            </div>           
        </section>
        
        <div class="container2">
            <div class="container_fix2">
                @if($info['status'] == true)
                    @include("budget.admin.block.block_{$info['variant']}", ['info' => $info])
                @endif
            </div>
        </div>

                
        <section class="ftco-section-parallax">
            <div class="parallax-img d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                            <h2>Модуль "Бюджет"</h2>
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
        
        <!-- Plugin checkselect! -->
        <script src="{{ asset('assets/plugins/checkselect/checkselect.js') }}" type="text/javascript"></script>
        <!-- The end checkselect! -->

    </body>
</html>






