@php
    //var_dump($info);
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Прогноз</title>
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
        <script src="https://cdn.jsdelivr.net"></script>
    </head>
    <body>        
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid px-md-4	">
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/portal/public/home" class="nav-link">Главная</a></li>
                        <li class="nav-item"><a href="/portal/public/budget/admin" class="nav-link">Таблица</a></li>
                        <li class="nav-item"><a href="/portal/public/budget/admin/archive" class="nav-link">Архив</a></li>
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
                        <h1 class="mb-3 bread">Прогноз коммунальных услуг</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">      
                    <div class="col-md-12 col-lg-8 mb-5">         
                        <form action="/portal/public/forecast/admin" method="get">   
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Таблица</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="table" class="form-control">
                                                    <option value="1">Таблица тарифов</option>
                                                    <option value="2">Таблица ошибок</option>
                                                    <option value="3">Таблица «МБ»</option>
                                                    <option value="4">Таблица «ПД»</option>
                                                    <option value="5">Таблица «МБ+ПД»</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Тариф</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="tariff" class="form-control">
                                                    <option value="heat">Теплоснабжение</option>
                                                    <option value="water">Водоснабжение</option>
                                                    <option value="drainage">Водоотведение</option>
                                                    <option value="power">Электроснабжение</option>
                                                    <option value="trash">Вывоз мусора</option>
                                                    <option value="negative">Негативное воздействие</option>
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
                            <tr>
                                <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/calculator.png') }}" alt="" id="communal"></a> - Синхронизация (КУ)</p></td>
                                <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/calculator.png') }}" alt="" id="budget"></a> - Синхронизация (Бюджет)</p></td>
                                @if($info['table'] > 2)
                                    <input type="hidden" class="table" value="{{ $info['table'] }}">
                                    <input type="hidden" class="tariff" value="{{ $info['tariff'] }}">
                                    <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/excel-48.png') }}" alt="" id="xlsx"></a> - Экспорт в xlsx</p></td>
                                @endif
                            </tr>
                        </div>   
                    </div>                    
                  
                </div>
            </div>
       
        </section>
        
        <div class="container2">
            <div class="container_fix2">
                <div id="table"></div>  
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

        
        <script>   
            $(document).ready(function(){ 
                //Выполняем запись в БД при нажатии на клавишу ENTER
                function setKeydownmyForm() {
                    $('input').keydown(function(e) {
                        if (e.keyCode === 13) {
                            let td = this.closest('td');
                            let id = $('.tariff-id', td).val(); 

                            //Получаем значения, меняем запятую на точку и убираем пробелы в числе                   
                            function structure(title){
                                var volume = $(title, td).val();
                                //Меняем запятую на точку
                                //Убираем лишние пробелы
                                //Выполняем арифметические действия в строке
                                var volume = volume.replace(/\,/g,'.');
                                var volume = volume.replace(/ /g,'');
                                var volume = eval(volume);
                                return volume;
                            }

                            let tariff = structure('.tariff');

                            $.ajax({ 
                                url:"/portal/public/forecast/admin/tariff/update",  
                                method:"patch",  
                                data:{
                                    "_token": "{{ csrf_token() }}",
                                    id, tariff
                                },
                                dataType:"text",  
                                success:function(data){  
                                    fetch_data(); 
                                } 
                            })                
                        }               
                    })
                }
                
                //Подгружаем BACK шаблон отрисовки
                function fetch_data(){ 
                    let form = <?=json_encode($info)?>;
                    let table = form['table'];
                    let tariff = form['tariff'];
                    
                    $.ajax({  
                        url:"/portal/public/forecast/admin/table",  
                        method:"GET",
                        data:{
                            table, tariff
                        },
                        dataType:"text",
                        success:function(data){  
                            $('#table').html(data);  
                            if (table == 1) {
                                setKeydownmyForm();
                            }else if (table == 2) {
                                // Какая-то другая логика для второй таблицы
                            }
                        }   
                    });  
                } 
                fetch_data();  
                
                //Выполняем действие (изменение статуса) при нажатии на кнопку
                $(document).on('click', '#communal', function(){
                    
                    $.ajax({
                        url:"/portal/public/forecast/admin/synch/communal",  
                        method:"patch",
                        data:{
                            "_token": "{{ csrf_token() }}",
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
                
                //Выполняем действие (изменение статуса) при нажатии на кнопку
                $(document).on('click', '#budget', function(){
                    
                    $.ajax({
                        url:"/portal/public/forecast/admin/synch/budget",  
                        method:"patch",
                        data:{
                            "_token": "{{ csrf_token() }}",
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
                
                //Выполняем действие (EXCEL) при нажатии на кнопку
                $(document).on('click', '#xlsx', function(){
                    let tr = this.closest('tr');
                    let table = $('.table', tr).val();
                    let tariff = $('.tariff', tr).val();
                    
                    // Создаем объект параметров
                    let params = new URLSearchParams();
                    params.append('table', table);
                    params.append('tariff', tariff);

                    //переходим по ссылке
                    let baseUrl = '/portal/public/forecast/admin/export';
                    window.location.href = `${baseUrl}?${params.toString()}`;
                })
            });
        </script>
    </body>
</html>






