<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Коммунальные услуги</title>
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
                        <li class="nav-item"><a href="/portal/public/utilities/admin" class="nav-link">Таблица</a></li>
                        <li class="nav-item"><a href="/portal/public/utilities/admin/diagrams" class="nav-link">Диаграммы</a></li>
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
                        <p class="breadcrumbs mb-0"><span class="mr-3"></span> <span>Вы вошли как: {{ $info['email'] }}</span></p>
                        <h1 class="mb-3 bread">Коммунальные услуги (тарифы)</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section bg-light">
            <div class="container">
                <form action="/portal/public/utilities/admin/tariffs" id="parameters" method="get">
                <div class="row">                            
                    <div class="sidebar-box bg-white p-4 ftco-animate col-md-3">
                        <h3 class="heading-sidebar">Месяц:</h3>       
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="1"> Январь</label><br>        
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="2"> Февраль</label><br>  
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="3"> Март</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="4"> Апрель</label><br> 
                    </div>

                    <div class="sidebar-box bg-white p-4 ftco-animate col-md-3">
                        <h3 class="heading-sidebar">Месяц:</h3>
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="5"> Май</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="6"> Июнь</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="7"> Июль</label><br>        
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="8"> Август</label><br>  
                    </div>
                       
                    <div class="sidebar-box bg-white p-4 ftco-animate col-md-3">
                        <h3 class="heading-sidebar">Месяц:</h3> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="9"> Сентябрь</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="10"> Октябрь</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="11"> Ноябрь</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth[]" value="12"> Декабрь</label><br> 
                    </div>
                    
                    <div class="sidebar-box bg-white p-4 ftco-animate col-md-3">
                        <div class="col-md-12">
                            <button class="btn btn-primary  py-2 px-5" id='btn_parameters' type="submit">Применить</button>
                        </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </section>
        
        <div class="container2">
            <p><font color="Blue">*Выбранные параметры: <u>год</u> 2026 <u>месяц</u> {{ $info['mounth_name'] }}</p>           

                <div id="table"></div>                 
            
        </div>       
        </br>
      
        <section class="ftco-section-parallax">
            <div class="parallax-img d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                            <h2>Модуль "Коммунальные услуги"</h2>
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
        <script>
            $(document).ready(function(){  
                //Выполняем запись в БД при нажатии на клавишу ENTER
                function setKeydownmyForm() {
                    $('input').keydown(function(e) {
                        if (e.keyCode === 13) {
                            let tr = this.closest('tr');
                            let id = $('.id', tr).val(); 
                            
                            //Получаем значения, меняем запятую на точку и убираем пробелы в числе                   
                            function structure(title){
                                let volume = $(title, tr).val();
                                volume = volume.replace(",",".");
                                volume = volume.replace(/ /g,'');
                                return volume;
                            }
                            
                            let tarif_min = structure('.min');
                            let tarif_max = structure('.max');
                            
                            $.ajax({
                                url:"/portal/public/utilities/admin/tariffs/update",  
                                method:"patch",  
                                data:{
                                    "_token": "{{ csrf_token() }}",
                                    id, tarif_min, tarif_max
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
                    let year = form['year'];
                    let mounth = form['mounth'];
                    
                    $.ajax({                
                        url:"/portal/public/utilities/admin/tariffs/table", 
                        method:"GET",
                        data:{
                            year, mounth
                        },
                        dataType:"text",
                        success:function(data){  
                            $('#table').html(data); 
                            setKeydownmyForm()
                        }   
                    });  
                } 
                fetch_data();  
                
                //Выполняем действие (изменение статуса) при нажатии на кнопку
                $(document).on('click', '#synch', function(){
                    let tr = this.closest('tr');
                    let mounth = $('.mounth', tr).val();
                    let year = 2026;
                    
                    $.ajax({
                        url:"/portal/public/utilities/admin/tariffs/synch",  
                        method:"patch",
                        data:{
                            "_token": "{{ csrf_token() }}",
                            year, mounth,
                        },
                        dataType:"text",  
                        success:function(data){  
                            alert(data);
                            fetch_data();  
                        } 
                    })             
                })
            });
        </script>
    </body>
</html>





