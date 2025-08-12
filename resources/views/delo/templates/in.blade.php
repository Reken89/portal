<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Входящая почта</title>
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
                        <h1 class="mb-3 bread">Входящая почта</h1>
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
                            <input type='hidden' name='user_id' value='{{ $info['user_id'] }}'>  
                                 
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Вид документа</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="npa" class="form-control chosen-select">
                                                    @foreach ($info['npa'] as $npa1) 
                                                        <option value="{{ $npa1['id'] }}">{{ $npa1['title'] }}</option>
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
                                                <select name="corr" class="form-control chosen-select">
                                                    @foreach ($info['corr'] as $corr1) 
                                                    <option value="{{ $corr1['id'] }}">{{ $corr1['title'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                     

                            <div class="row form-group">
                                <div class="col-md-12"><h3>Содержание</h3></div>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <textarea name="content" class="form-control" cols="30" rows="3"></textarea>
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
                        
                        <div class="sidebar-box bg-white p-4 ftco-animate">
                            <h3 class="heading-sidebar">Фильтры</h3>
                            <form action="#" id="filters" method="post" class="browse-form">
                                @if (session('user_filter') == NULL || session('user_filter') == FALSE || session('user_filter') == "no")
                                    <label for="option-job-3"><input type="checkbox" id="user_filter" name="user_filter" value="yes"> Только Вашм письма</label><br>
                                @else
                                    <label for="option-job-3"><input type="checkbox" id="user_filter" name="user_filter" value="yes" checked> Только Вашм письма</label><br>
                                @endif
                                </br>
                                <div class="col-md-12">
                                    <button class="btn btn-primary  py-2 px-5" id='btn_filter' type="button">Применить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                        
                    <div class="container">
                        <div class="row">       
                            <div class="col-md-12 col-lg-8 mb-5">
                                @foreach ($info['documents'] as $value) 
                                    @php
                                        $correspondent = mb_substr($value['correspondent']['title'], 0, 40, "UTF-8");
                                    @endphp
                                                                       
                                    @if($value['user']['name'] == $info['author'])
                                        @if($value['status']  == 10)
                                            <div class="col-md-12 ftco-animate">
                                                <div style="background-color: PeachPuff;" class="job-post-item p-2 d-block d-lg-flex align-items-center">
                                                    <div class="one-third mb-4 mb-md-0">
                                                        <div class="job-post-item-header align-items-center">
                                                            <span class="subadge">№ {{ $value['number'] }} ({{ $value['npa']['title'] }})</span>
                                                            <p><b>{{ $correspondent }}</b></p>
                                                            <p class="mb-4">{{ $value['content'] }}</p>
                                                        </div>
                                                        <div class="job-post-item-body d-block d-md-flex">
                                                            <div class="mr-3"><span class="icon-layers"></span>{{ $value['date'] }}</a></div>
                                                            <div><span class="icon-my_location"></span> <span>{{ $value['user']['name'] }}</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden" class="id" value="{{ $value['id'] }}">
                                                                    <td><input type=button class="btn btn-primary py-2" id='status' value='Изменить'></td>  
                                                                </td>
                                                            </tr>
                                                        </table>     
                                                    </div>
                                                </div>
                                            </div><!-- end -->  
                                        @else
                                            <div class="col-md-12 ftco-animate">  
                                                <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                                                    <form action="#" id="update" method="post" class="p-5 bg-white">
                                                        <input type='hidden' name='id' value='{{ $value['id'] }}'>  
                                                        
                                                        <div class="row form-group">
                                                            <div class="col-md-12 mb-3 mb-md-0">
                                                                <label class="font-weight-bold" for="fullname">Вид документа</label>
                                                                <div class="form-group">
                                                                    <div class="form-field">
                                                                        <div class="select-wrap">
                                                                            <select name="npa" class="form-control chosen-select">
                                                                                <option selected value="{{ $value['npa']['id'] }}">{{ $value['npa']['title'] }}</option>
                                                                                @foreach ($info['npa'] as $npa) 
                                                                                    <option value="{{ $npa['id'] }}">{{ $npa['title'] }}</option>
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
                                                                            <select name="corr" class="form-control chosen-select">
                                                                                <option selected value="{{ $value['correspondent']['id'] }}">{{ $value['correspondent']['title'] }}</option>
                                                                                @foreach ($info['corr'] as $corr) 
                                                                                    <option value="{{ $corr['id'] }}">{{ $corr['title'] }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                        <div class="row form-group">
                                                            <div class="col-md-12 mb-3 mb-md-0">
                                                                <label class="font-weight-bold" for="fullname">Дата</label>
                                                                <input type="date" value="{{ $value['date'] }}" id="date" name="date" class="date"/>    
                                                            </div>
                                                        </div>  
                                                        <div class="row form-group">
                                                            <div class="col-md-12"><h3>Содержание</h3></div>
                                                            <div class="col-md-12 mb-3 mb-md-0">
                                                                <textarea name="content" class="form-control" cols="30" rows="3">{{ $value['content'] }}</textarea>
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
                                    @else
                                        <div class="col-md-12 ftco-animate">
                                            <div style="background-color: PaleTurquoise;" class="job-post-item p-2 d-block d-lg-flex align-items-center">
                                                <div class="one-third mb-4 mb-md-0">
                                                    <div class="job-post-item-header align-items-center">
                                                        <span class="subadge">№ {{ $value['number'] }} ({{ $value['npa']['title'] }})</span>
                                                        <p><b>{{ $correspondent }}</b></p>
                                                        <p class="mb-4">{{ $value['content'] }}</p>
                                                    </div>
                                                    <div class="job-post-item-body d-block d-md-flex">
                                                        <div class="mr-3"><span class="icon-layers"></span>{{ $value['date'] }}</a></div>
                                                        <div><span class="icon-my_location"></span> <span>{{ $value['user']['name'] }}</span></div>
                                                    </div>
                                                </div>
                                                <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                                    <button class="btn btn-primary py-2" id='access' type="button">Изменить</button>
                                                </div>
                                            </div>
                                        </div><!-- end -->  
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

