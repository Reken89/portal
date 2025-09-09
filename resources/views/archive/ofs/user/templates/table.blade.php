<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Архив ОФС</title>
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
                        <h1 class="mb-3 bread">Архив ОФС 2023-2025г.</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">      
                    <div class="col-md-12 col-lg-8 mb-5">         
                        <form action="#" id="parameters" method="post" class="p-5 bg-white">
                                 
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Раздел</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="checkselect">
                                                <label><input type="checkbox" name="chapter" value="1" checked> МБ МЗ(МБ)</label>
                                                <label><input type="checkbox" name="chapter" value="2"> МБ ИЦ</label>
                                                <label><input type="checkbox" name="chapter" value="3"> РК МЗ(РК)</label>
                                                <label><input type="checkbox" name="chapter" value="4"> РК ИЦ</label>
                                                <label><input type="checkbox" name="chapter" value="5"> ПД</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                                 
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Год</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="year" class="form-control">
                                                    <option value="2025">2025 год</option>
                                                    <option value="2024">2024 год</option>
                                                    <option value="2023">2023 год</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Месяц</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="mounth" class="form-control">
                                                    <option value="1">январь</option>
                                                    <option value="2">февраль</option>
                                                    <option value="3">март</option>
                                                    <option value="4">апрель</option>
                                                    <option value="5">май</option>
                                                    <option value="6">июнь</option>
                                                    <option value="7">июль</option>
                                                    <option value="8">август</option>
                                                    <option value="9">сентябрь</option>
                                                    <option value="10">октябрь</option>
                                                    <option value="11">ноябрь</option>
                                                    <option value="12">декабрь</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Учреждение</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="user" class="form-control">
                                                    @if ($info['role'] == "cb_buh")  
                                                        <option value="25">Администрация Костомукшского муниципального округа</option>
                                                        <option value="26">Муниципальные закупки Костомукшского муниципального округа</option>
                                                        <option value="23">Комитет по управлению муниципальной собственностью</option>
                                                        <option value="27">Совет Костомукшского муниципального округа</option>
                                                        <option value="28">Контрольно-счетный орган Костомукшского муниципального округа</option>
                                                        <option value="29">Централизованная бухгалтерия муниципальных учреждений</option>
                                                    @endif
                                                    @if ($info['role'] == "cb_school")  
                                                        <option value="3">Средняя общеобразовательная школа №1</option>
                                                        <option value="4">Средняя общеобразовательная школа №2</option>
                                                        <option value="5">Средняя общеобразовательная школа №3</option>
                                                        <option value="7">МБОУ КМО "ГИМНАЗИЯ"</option>
                                                        <option value="8">Вокнаволокская средняя общеобразовательная школа</option>
                                                    @endif
                                                    @if ($info['role'] == "cb_kultura")  
                                                        <option value="17">МБОУ ДО КМО "Центр внешкольной работы"</option>
                                                        <option value="18">МКУ ДО КМО "ДХШ им. Л.Ланкинена"</option>
                                                        <option value="19">МКУ ДО КМО "ДМШ им. Г.А.Вавилова"</option>
                                                        <option value="16">МБОУ ДО КМО "Спортивная школа"</option>
                                                        <option value="20">Муниципальный архив и Центральная библиотека</option>
                                                        <option value="21">МБУ КМО "Центр культурного развития"</option>
                                                        <option value="22">МАУ ДПО «ЦРО»</option>
                                                    @endif
                                                    @if ($info['role'] == "cb_kultura")  
                                                        <option value="9">МКДОУ "Ауринко"</option>
                                                        <option value="15">МКДОУ "Солнышко"</option>
                                                        <option value="13">МКДОУ "Кораблик"</option>
                                                        <option value="10">МКДОУ "Берёзка"</option>
                                                        <option value="12">МКДОУ "Золотой ключик"</option>
                                                        <option value="11">МКДОУ "Гномик"</option>
                                                        <option value="14">МКДОУ "Сказка"</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-primary  py-2 px-5" id='btn_add' type="button">Запрос</button>
                                </div>
                            </div>
                        </form>
                    </div>                  

                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Информация:</h3>
                            <p class="mb-0 font-weight-bold">Выберите необходимые параметры и нажмите кнопку «Запрос». В таблице ниже сформируется excel файл для загрузки.</p>
                        </div>   
                    </div>                    
                        
                    <div class="container">
                        <div class="row">       
                            <div class="col-md-12 col-lg-8 mb-5">
                                
                           </div>                  
                        </div>
                    </div>                      
                </div>
            </div>
            
            <div class="container">
                <div class="row">       
                    <div class="col-md-12 col-lg-8 mb-5">
                        <table class="table2">
                            <thead>
                                <tr>
                                    <th style="min-width: 100px; width: 100px;"><font color="White">№ запроса</th>
                                    <th style="min-width: 100px; width: 100px;"><font color="White">Учреждение</th>
                                    <th style="min-width: 200px; width: 200px;" colspan="3"><font color="White">Параметры</th> 
                                    <th style="min-width: 100px; width: 100px;"><font color="White">Дата запроса</th> 
                                    <th style="min-width: 100px; width: 100px;"><font color="White">Файл</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td style="min-width: 100px; width: 100px;"><b>Год</b></td>
                                    <td style="min-width: 100px; width: 100px;"><b>Месяц</b></td>
                                    <td style="min-width: 100px; width: 100px;"><b>Разделы</b></td>
                                    <td></td><td></td>
                                </tr>

                            </tbody>
                        </table>    
                    </div>                      
                </div>
            </div>
            
        </section>
        
        <section class="ftco-section-parallax">
            <div class="parallax-img d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                            <h2>Модуль "Архив"</h2>
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


