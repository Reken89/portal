<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Корреспонденты</title>
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
        
        <!-- Plugin chosen! -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/chosen/docsupport/prism.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/chosen/chosen.css') }}">
        <!-- The end chosen! -->
    </head>
    <body>        
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid px-md-4	">
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/portal/public/home" class="nav-link">Главная</a></li>
                        <li class="nav-item"><a href="/portal/public/delo/out" class="nav-link">Исходящая почта</a></li>
                        <li class="nav-item"><a href="/portal/public/delo/in" class="nav-link">Входящая почта</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Справочники</a></li>
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
                        <h1 class="mb-3 bread">Корреспонденты</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">      
                    <div class="col-md-12 col-lg-8 mb-5">         
                        <form action="#" id="correspondent" method="post" class="p-5 bg-white">
                  
                            <div class="row form-group">
                                <div class="col-md-12"><h3>Название</h3></div>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <textarea name="title" class="form-control" cols="30" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    @if($info['role'] == "deloadm")
                                        <button class="btn btn-primary  py-2 px-5" id='btn_add' type="button">Добавить</button>
                                    @else
                                        <button class="btn btn-primary  py-2 px-5" id='plug' type="button">Добавить</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>                  

                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Информация:</h3>
                            <p class="mb-0 font-weight-bold">Только начальник отдела может добавлять и редактировать корреспондентов</p>
                        </div>
                    </div>
                        
                    <div class="container">
                        <div class="row">       
                            <div class="col-md-12 col-lg-8 mb-5">
                                @foreach ($info['corr'] as $value) 
                                    @php
                                        $correspondent = mb_substr($value['title'], 0, 40, "UTF-8");
                                    @endphp   
                                    <style>
                                        .white-text {
                                            color: White;
                                        }
                                    </style>
                                    @if($value['status']  == 10)
                                        <div class="col-md-12 ftco-animate">
                                            <div style="background-color: CornflowerBlue;" class="job-post-item p-2 d-block d-lg-flex align-items-center">
                                                <div class="one-third mb-4 mb-md-0">
                                                    <div class="job-post-item-header align-items-center">
                                                        <p class="white-text"><b>{{ $correspondent }}</b></p>
                                                    </div>
                                                </div>
                                                <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" class="id" value="{{ $value['id'] }}">
                                                                @if($info['role'] == "deloadm")
                                                                    <td><input type=button class="btn btn-primary py-2" id='status' value='Изменить'></td>  
                                                                @else
                                                                    <td><input type=button class="btn btn-primary py-2" id='plug' value='Изменить'></td> 
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>     
                                                </div>
                                            </div>
                                        </div><!-- end --> 
                                    @else
                                        <div class="col-md-12 ftco-animate">  
                                            <div class="job-post-item p-2 d-block d-lg-flex align-items-center">
                                                <form action="#" id="update" method="post" class="p-5 bg-white">
                                                    <input type='hidden' name='id' value='{{ $value['id'] }}'>  

                                                    <div class="row form-group">
                                                        <div class="col-md-12"><h3>Название</h3></div>
                                                        <div class="col-md-12 mb-3 mb-md-0">
                                                            <textarea name="title" class="form-control" cols="50" rows="2">{{ $value['title'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-primary  py-2 px-5" id='btn_save' type="button">Сохранить</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                </br>
                                            </div>    
                                        </div>  
                                    @endif
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
        
        <!-- Plugin chosen! -->
        <script src="{{ asset('assets/plugins/chosen/docsupport/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/chosen/chosen.jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/chosen/docsupport/prism.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('assets/plugins/chosen/docsupport/init.js') }}" type="text/javascript" charset="utf-8"></script>
        <!-- The end chosen! -->
    </body>
</html>


