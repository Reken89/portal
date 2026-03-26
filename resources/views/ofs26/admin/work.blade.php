@php
    //var_dump($info['matrix']);
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>ОФС</title>
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
                        <h1 class="mb-3 bread">ОФС 2026г.</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section bg-light">
            <div style="background-color: PaleTurquoise;" class="container">
                <div class="row"> 
                    <div class="col-md-12 col-lg-8 mb-5">         
                        <form action="/portal/public/ofs26/admin/export" id="parameters" method="get" class="p-5 bg-white">

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Месяц</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="checkselect">                                                
                                                <label><input type="checkbox" name="month[]" value="1"> январь</label>
                                                <label><input type="checkbox" name="month[]" value="2">февраль</label>
                                                <label><input type="checkbox" name="month[]" value="3">март</label>
                                                <label><input type="checkbox" name="month[]" value="4">апрель</label>
                                                <label><input type="checkbox" name="month[]" value="5">май</label>
                                                <label><input type="checkbox" name="month[]" value="6">июнь</label>
                                                <label><input type="checkbox" name="month[]" value="7">июль</label>
                                                <label><input type="checkbox" name="month[]" value="8">август</label>
                                                <label><input type="checkbox" name="month[]" value="9">сентябрь</label>
                                                <label><input type="checkbox" name="month[]" value="10">октябрь</label>
                                                <label><input type="checkbox" name="month[]" value="11">ноябрь</label>
                                                <label><input type="checkbox" name="month[]" value="12">декабрь</label>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Раздел</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="checkselect">
                                                <label><input type="checkbox" name="chapter[]" value="1"> МБ МЗ(МБ)</label>
                                                <label><input type="checkbox" name="chapter[]" value="2"> МБ ИЦ</label>
                                                <label><input type="checkbox" name="chapter[]" value="3"> РК МЗ(РК)</label>
                                                <label><input type="checkbox" name="chapter[]" value="4"> РК ИЦ</label>
                                                <label><input type="checkbox" name="chapter[]" value="5"> ПД</label>
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
                                            <div class="checkselect">                                                
                                                <label><input type="checkbox" name="user_id[]" value="25">Администрация Костомукшского муниципального округа</label>
                                                <label><input type="checkbox" name="user_id[]" value="26">Муниципальные закупки Костомукшского муниципального округа</label>
                                                <label><input type="checkbox" name="user_id[]" value="23">Комитет по управлению муниципальной собственностью</label>
                                                <label><input type="checkbox" name="user_id[]" value="27">Совет Костомукшского муниципального округа</label>
                                                <label><input type="checkbox" name="user_id[]" value="28">Контрольно-счетный орган Костомукшского муниципального округа</label>
                                                <label><input type="checkbox" name="user_id[]" value="29">Централизованная бухгалтерия муниципальных учреждений</label>
                                                <label><input type="checkbox" name="user_id[]" value="3">Средняя общеобразовательная школа №1</label>
                                                <label><input type="checkbox" name="user_id[]" value="4">Средняя общеобразовательная школа №2</label>
                                                <label><input type="checkbox" name="user_id[]" value="5">Средняя общеобразовательная школа №3</label>
                                                <label><input type="checkbox" name="user_id[]" value="7">МБОУ КМО "ГИМНАЗИЯ"</label>
                                                <label><input type="checkbox" name="user_id[]" value="8">Вокнаволокская средняя общеобразовательная школа</label>
                                                <label><input type="checkbox" name="user_id[]" value="17">МБОУ ДО КМО "Центр внешкольной работы"</label>
                                                <label><input type="checkbox" name="user_id[]" value="18">МКУ ДО КМО "ДХШ им. Л.Ланкинена"</label>
                                                <label><input type="checkbox" name="user_id[]" value="19">МКУ ДО КМО "ДМШ им. Г.А.Вавилова"</label>
                                                <label><input type="checkbox" name="user_id[]" value="16">МБОУ ДО КМО "Спортивная школа"</label>
                                                <label><input type="checkbox" name="user_id[]" value="20">Муниципальный архив и Центральная библиотека</label>
                                                <label><input type="checkbox" name="user_id[]" value="21">МБУ КМО "Центр культурного развития"</label>
                                                <label><input type="checkbox" name="user_id[]" value="9">МКДОУ "Ауринко"</label>
                                                <label><input type="checkbox" name="user_id[]" value="15">МКДОУ "Солнышко"</label>
                                                <label><input type="checkbox" name="user_id[]" value="13">МКДОУ "Кораблик"</label>
                                                <label><input type="checkbox" name="user_id[]" value="10">МКДОУ "Берёзка"</label>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-primary  py-2 px-5" id='btn_add' type="submit">Выгрузить</button>
                                </div>
                            </div>
                        </form>
                    </div>                  

                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <form action="#" id="info" method="post" class="browse-form">
                            <h3 class="h5 text-black mb-3"><font color="red">Открыть доступ</h3>
                            <p class="mb-0 font-weight-bold"><font color="red"></p>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Учреждение</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="user_id" class="form-control">                                                    
                                                    <option value="25">Администрация Костомукшского муниципального округа</option>
                                                    <option value="26">Муниципальные закупки Костомукшского муниципального округа</option>
                                                    <option value="23">Комитет по управлению муниципальной собственностью</option>
                                                    <option value="27">Совет Костомукшского муниципального округа</option>
                                                    <option value="28">Контрольно-счетный орган Костомукшского муниципального округа</option>
                                                    <option value="29">Централизованная бухгалтерия муниципальных учреждений</option>

                                                    <option value="3">Средняя общеобразовательная школа №1</option>
                                                    <option value="4">Средняя общеобразовательная школа №2</option>
                                                    <option value="5">Средняя общеобразовательная школа №3</option>
                                                    <option value="7">МБОУ КМО "ГИМНАЗИЯ"</option>
                                                    <option value="8">Вокнаволокская средняя общеобразовательная школа</option>

                                                    <option value="17">МБОУ ДО КМО "Центр внешкольной работы"</option>
                                                    <option value="18">МКУ ДО КМО "ДХШ им. Л.Ланкинена"</option>
                                                    <option value="19">МКУ ДО КМО "ДМШ им. Г.А.Вавилова"</option>
                                                    <option value="16">МБОУ ДО КМО "Спортивная школа"</option>
                                                    <option value="20">Муниципальный архив и Центральная библиотека</option>
                                                    <option value="21">МБУ КМО "Центр культурного развития"</option>

                                                    <option value="9">МКДОУ "Ауринко"</option>
                                                    <option value="15">МКДОУ "Солнышко"</option>
                                                    <option value="13">МКДОУ "Кораблик"</option>
                                                    <option value="10">МКДОУ "Берёзка"</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="font-weight-bold" for="fullname">Месяц</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="month" class="form-control">
                                                    <option value="1">Январь</option>
                                                    <option value="2">Февраль</option>
                                                    <option value="3">Март</option>
                                                    <option value="4">Апрель</option>
                                                    <option value="5">Май</option>
                                                    <option value="6">Июнь</option>
                                                    <option value="7">Июль</option>
                                                    <option value="8">Август</option>
                                                    <option value="9">Сентябрь</option>
                                                    <option value="10">Октябрь</option>
                                                    <option value="11">Ноябрь</option>
                                                    <option value="12">Декабрь</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            </br>
                            <div class="col-md-12">
                                <button class="btn btn-primary  py-2 px-5" id='open' type="button">Открыть</button>
                            </div>
                            </form>
                        </div>   
                        
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"><font color="red">Статистика:</h3>
                            <p class="mb-0 font-weight-bold"><font color="red">Количество обращений к модулю {{ $info['counter']['point'] }}</p>        
                            <p class="mb-0 font-weight-bold"><font color="red">Последняя дата обращения {{ $info['counter']['date'] }}</p>   
                        </div> 
                    </div>     
                                                         
                </div>
            </div>           
        </section>
                
        <div class="row justify-content-center"> 
            <div class="col-md-12 col-lg-8 offset-lg-1 mb-5">         
                <font color="Black">
                <table> 
                    <thead style="background-color: #546e7a; border-bottom: 2px solid #37474f;">
                        <tr>
                            <th style="min-width: 110px; width: 110px;"><font color="White">Учреждение</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Январь</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Февраль</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Март</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Апрель</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Май</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Июнь</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Июль</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Август</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Сентябрь</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Октябрь</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Ноябрь</th>
                            <th style="min-width: 70px; width: 70px;"><font color="White">Декабрь</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($info['matrix'] as $row)
                            <tr>
                                <td style="background-color: #e3f2fd; font-weight: bold;">{{ $row['name'] }}</td>
                                @foreach($row['statuses'] as $status)                                          
                                    @if($status === 1) <td style="background-color: #c8e6c9; color: #2e7d32; text-align: center; border: 1px solid #dee2e6;">закрыто</td>
                                    @elseif($status === 2) <td style="background-color: #ffcdd2; color: #c62828; text-align: center; border: 1px solid #dee2e6;">открыто</td>
                                    @endif                                           
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>   
        </div>           
        </br>
                
        <section class="ftco-section-parallax">
            <div class="parallax-img d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                            <h2>Модуль "ОФС"</h2>
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
        <script>
            $(document).ready(function(){ 
                //Выполняем действие (изменение статуса) при нажатии на кнопку
                $(document).on('click', '#open', function(){
                    let info = $('#info').serializeArray();

                    let user_id = info.find(i => i.name === 'user_id')?.value;
                    let month = info.find(i => i.name === 'month')?.value;
                    
                    $.ajax({
                        url:"/portal/public/ofs26/admin/status",  
                        method:"patch",
                        data:{
                            "_token": "{{ csrf_token() }}",
                            user_id, month
                        },
                        dataType: "json", // Ждем JSON, а не просто текст
                        success: function(response) {  
                            // response — это теперь объект { "message": "..." }
                            alert(response.message);
                            fetch_data();  
                        },
                        error: function(xhr) {
                            // Если сервер вернул ошибку (400, 422, 500), попадем сюда
                            let errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'Ошибка сервера';
                            alert(errorMessage);
                        }
                    })             
                })
            });
        </script>
    </body>
</html>





