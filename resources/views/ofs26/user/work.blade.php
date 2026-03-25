@php
    //var_dump($info);
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
                        <h1 class="mb-3 bread">ОФС 2026 (таблица)</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">      
                    <div class="col-md-12 col-lg-8 mb-5">         
                        <form action="/portal/public/ofs26/user" method="get">   
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Месяц</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <select name="mounth" class="form-control">
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
                            
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Раздел</label>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="checkselect">
                                                    <label><input type="checkbox" name="chapter[]" value="1" checked> МБ МЗ(МБ)</label>
                                                    <label><input type="checkbox" name="chapter[]" value="2"> МБ ИЦ</label>
                                                    <label><input type="checkbox" name="chapter[]" value="3"> РК МЗ(РК)</label>
                                                    <label><input type="checkbox" name="chapter[]" value="4"> РК ИЦ</label>
                                                    <label><input type="checkbox" name="chapter[]" value="5"> ПД</label>
                                                </div>
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
                                                    @endif
                                                    @if ($info['role'] == "cb_kinder")  
                                                        <option value="9">МКДОУ "Ауринко"</option>
                                                        <option value="15">МКДОУ "Солнышко"</option>
                                                        <option value="13">МКДОУ "Кораблик"</option>
                                                        <option value="10">МКДОУ "Берёзка"</option>
                                                    @endif
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
                            <p class="mb-0 font-weight-bold"><font color="red">отчетная дата: 17 число месяца</p>
                            </br>
                            @if($info['mounth'] > 0)
                            <tr>
                                <input type="hidden" class="mounth" value="{{ $info['mounth'] }}">
                                <input type="hidden" class="user" value="{{ $info['user'] }}">
                                
                                <input type="hidden" class="chapter" value="{{ json_encode($info['chapter']) }}">
                                <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/calculator.png') }}" alt="" id="synch"></a> - Синхронизация</p></td>
                                <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/tick.png') }}" alt="" id="close"></a> - Отправить в ФЭУ</p></td>
                                <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/excel-48.png') }}" alt="" id="xlsx"></a> - Экспорт в xlsx</p></td>
                                <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/laptop.png') }}" alt="" id="fullscreen"></a> - Полноэкранный режим</p></td>
                                <p><a href="{{ asset('assets/docs/manual.pdf') }}" download>
                                    <img src="{{ asset('assets/icons/document2.png') }}" alt="Скачать">
                                </a> - Инструкция</p>
                            </tr>
                            @endif
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
                //Выполняем запись в БД при нажатии на клавишу ENTER
                function setKeydownmyForm() {
                    $('input').keydown(function(e) {
                        if (e.keyCode === 13) {
                            let tr = this.closest('tr');
                            let ekr_id = $('.ekr_id', tr).val(); 
                            let number = $('.number', tr).val();
                            let mounth = $('.mounth', tr).val();
                            let chapter = $('.chapter', tr).val();
                            let user_id = $('.user_id', tr).val();
                            let id = $('.id', tr).val();

                            //Получаем значения, меняем запятую на точку и убираем пробелы в числе                   
                            function structure(title){
                                var volume = $(title, tr).val();
                                //Меняем запятую на точку
                                //Убираем лишние пробелы
                                //Выполняем арифметические действия в строке
                                var volume = volume.replace(/\,/g,'.');
                                var volume = volume.replace(/ /g,'');
                                var volume = eval(volume);
                                return volume;
                            }

                            let lbo = structure('.lbo');
                            let prepaid = structure('.prepaid');
                            let credit_year_all = structure('.credit_year_all');
                            let credit_year_term = structure('.credit_year_term');
                            let debit_year_all = structure('.debit_year_all');
                            let debit_year_term = structure('.debit_year_term');
                            let fact_mounth = structure('.fact_mounth');
                            let kassa_mounth = structure('.kassa_mounth');
                            let credit_end_all = structure('.credit_end_all');
                            let credit_end_term = structure('.credit_end_term');
                            let debit_end_all = structure('.debit_end_all');
                            let debit_end_term = structure('.debit_end_term');
                            let return_old_year = structure('.return_old_year');

                            $.ajax({ 
                                url:"/portal/public/ofs26/user/update",  
                                method:"patch",  
                                data:{
                                    "_token": "{{ csrf_token() }}",
                                    ekr_id, number, lbo, prepaid, credit_year_all,
                                    credit_year_term, debit_year_all, debit_year_term,
                                    fact_mounth, kassa_mounth, credit_end_all, credit_end_term,
                                    debit_end_all, debit_end_term, return_old_year,
                                    mounth, chapter, user_id, id,
                                },
                                dataType:"text",  
                                success:function(data){  
                                    fetch_data(); 
                                    //alert(data);
                                } 
                            })                   
                        }               
                    })
                }
                
                //Подгружаем BACK шаблон отрисовки
                function fetch_data(){ 
                    let form = <?=json_encode($info)?>;
                    let user = form['user'];
                    let chapter = form['chapter'];
                    let mounth = form['mounth'];
                    
                    $.ajax({  
                        url:"/portal/public/ofs26/user/table",  
                        method:"GET",
                        data:{
                            user, chapter, mounth
                        },
                        dataType:"text",
                        success:function(data){  
                            $('#table').html(data);  
                            setKeydownmyForm()
                        }   
                    });  
                } 
                fetch_data();
                
                //Выполняем действие (синхронизация) при нажатии на кнопку
                $(document).on('click', '#synch', function(){
                    let tr = this.closest('tr');
                    let mounth = $('.mounth', tr).val();
                    let user_id = $('.user', tr).val();
                    let chapter = JSON.parse($('.chapter', tr).val()); 
                    
                    $.ajax({
                        url:"/portal/public/ofs26/user/synch",  
                        method:"patch",
                        data:{
                            "_token": "{{ csrf_token() }}",
                            user_id, chapter, mounth
                        },
                        dataType:"text",  
                        success:function(data){  
                            alert(data);
                            fetch_data();  
                        } 
                    })             
                })
                
                //Выполняем действие (изменение статуса) при нажатии на кнопку
                $(document).on('click', '#close', function(){
                    let tr = this.closest('tr');
                    let mounth = $('.mounth', tr).val();
                    let user_id = $('.user', tr).val();
                    //let chapter = $('.chapter', tr).val();
                    let chapter = JSON.parse($('.chapter', tr).val()); 
                    
                    $.ajax({
                        url:"/portal/public/ofs26/user/close",  
                        method:"patch",
                        data:{
                            "_token": "{{ csrf_token() }}",
                            user_id, chapter, mounth
                        },
                        dataType:"text",  
                        success:function(data){  
                            alert(data);
                            fetch_data();  
                        } 
                    })             
                })
                
                //Выполняем действие (EXCEL) при нажатии на кнопку
                $(document).on('click', '#xlsx', function(){
                    let tr = this.closest('tr');
                    let mounth = $('.mounth', tr).val();
                    let user_id = $('.user', tr).val();
                    let chapter = JSON.parse($('.chapter', tr).val()); 
                    
                    // Создаем объект параметров
                    let params = new URLSearchParams();
                    params.append('user_id', user_id);
                    params.append('mounth', mounth);

                    // Добавляем каждый элемент массива отдельно с ключом chapter[]
                    chapter.forEach(id => {
                        params.append('chapter[]', id);
                    });
                    
                    // Формируем строку запроса
                    //let url = `/portal/public/ofs26/user/export?user_id=${user_id}&chapter[]=${chapter}&mounth=${mounth}`;

                    // Просто переходим по ней
                    //window.location.href = url;   
                    let baseUrl = '/portal/public/ofs26/user/export';
                    window.location.href = `${baseUrl}?${params.toString()}`;
                })
                
                //Выполняем действие (полноэкранный режим таблицы) при нажатии на кнопку
                $(document).on('click', '#fullscreen', function(){
                    let tr = this.closest('tr');
                    let mounth = $('.mounth', tr).val();
                    let user_id = $('.user', tr).val();
                    let chapter = JSON.parse($('.chapter', tr).val()); 
                    
                    // Создаем объект параметров
                    let params = new URLSearchParams();
                    params.append('user_id', user_id);
                    params.append('mounth', mounth);

                    // Добавляем каждый элемент массива отдельно с ключом chapter[]
                    chapter.forEach(id => {
                        params.append('chapter[]', id);
                    });

                    // Просто переходим по ней
                    let baseUrl = '/portal/public/ofs26/user/fullscreen';
                    window.location.href = `${baseUrl}?${params.toString()}`;
                })
            });
        </script>
    </body>
</html>






