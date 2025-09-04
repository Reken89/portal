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
                        <li class="nav-item"><a href="/portal/public/utilities/admin/tariffs" class="nav-link">Тарифы</a></li>
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
                        <h1 class="mb-3 bread">Коммунальные услуги (таблица)</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section bg-light">
            <div class="container">
                <form action="#" id="parameters" method="post">
                <div class="row">                            
                    <div class="sidebar-box bg-white p-4 ftco-animate col-md-3">
                        <h3 class="heading-sidebar">Месяц:</h3>       
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="1"> Январь</label><br>        
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="2"> Февраль</label><br>  
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="3"> Март</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="4"> Апрель</label><br> 
                    </div>

                    <div class="sidebar-box bg-white p-4 ftco-animate col-md-3">
                        <h3 class="heading-sidebar">Месяц:</h3>
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="5"> Май</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="6"> Июнь</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="7"> Июль</label><br>        
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="8"> Август</label><br>  
                    </div>
                       
                    <div class="sidebar-box bg-white p-4 ftco-animate col-md-3">
                        <h3 class="heading-sidebar">Месяц:</h3> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="9"> Сентябрь</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="10"> Октябрь</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="11"> Ноябрь</label><br> 
                        <label for="option-job-3"><input type="checkbox" id="user_filter" name="mounth" value="12"> Декабрь</label><br> 
                    </div>
                    
                    <div class="sidebar-box bg-white p-4 ftco-animate col-md-3">
                        <div class="col-md-12">
                            <button class="btn btn-primary  py-2 px-5" id='btn_parameters' type="button">Применить</button>
                        </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </section>
        
        <div class="container2">
            <p><font color="RoyalBlue">*Выбранные параметры: <u>год</u> 2026 <u>месяц</u> @foreach($info['mounth_name'] AS $value) {{ $value }}, @endforeach</p>
            <div class="container_fix2">
                <table class="table2">
                    <thead>
                        <tr>
                            <th style="min-width: 80px; width: 80px;"><font color="White">Учреждение</th>
                            <th style="min-width: 80px; width: 80px;"><font color="White">Дата</th>
                            <th style="min-width: 100px; width: 100px;"><font color="White">Статус</th>
                            <th style="min-width: 200px; width: 200px;" colspan="6"><font color="White">Теплоснабжение</th> 
                            <th style="min-width: 200px; width: 200px;" colspan="6"><font color="White">Водоотведение</th> 
                            <th style="min-width: 200px; width: 200px;" colspan="6"><font color="White">Негативное воздействие</th> 
                            <th style="min-width: 200px; width: 200px;" colspan="6"><font color="White">Водоснабжение</th> 
                            <th style="min-width: 200px; width: 200px;" colspan="6"><font color="White">Электроснабжение</th> 
                            <th style="min-width: 200px; width: 200px;" colspan="6"><font color="White">Вывоз мусора</th>    
                            <th style="min-width: 150px; width: 150px;" rowspan="2"><font color="White">ИТОГО</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><a href="/portal/public/utilities/admin/export"><img src="{{ asset('assets/icons/excel-48.png') }}" alt=""></a></th>
                            <td><img src="{{ asset('assets/icons/calendar.png') }}" alt=""></td>
                            <td></td>
                            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
                            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма МБ</b></td>
                            <td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма всего</b></td>
                            
                            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
                            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма МБ</b></td>
                            <td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма всего</b></td>
                                                     
                            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
                            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма МБ</b></td>
                            <td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма всего</b></td>
                            
                            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
                            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма МБ</b></td>
                            <td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма всего</b></td>
                            
                            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
                            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма МБ</b></td>
                            <td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма всего</b></td>
                            
                            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
                            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма МБ</b></td>
                            <td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><font color="Red"><b>Сумма всего</b></td>
                            <td></td>
                        </tr>
                        @foreach ($info['utilities'] as $value)
                            @if($info['variant'] == "one")
                                <tr>
                                    <input type="hidden" class="id" value="{{ $value['id'] }}">
                                    <th><font color="RoyalBlue">{{ $value['user']['name'] }}</th>
                                    <td><font color="blue">{{ $value['date'] }}</td>
                                    @if ($value['status'] == 1)
                                        <td><img src="{{ asset('assets/icons/tick.png') }}" alt=""></td>
                                    @elseif ($value['status'] == 3)
                                        <td><a href="" onclick="return false"><img src="{{ asset('assets/icons/attention.png') }}" alt="" id="status"></a></td>
                                    @else
                                        <td><img src="{{ asset('assets/icons/minus.png') }}" alt=""></td>
                                    @endif
                                    <td><font color="blue">{{ number_format($value['mb_volume_heat'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pd_volume_heat'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_heat'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mb_sum_heat'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pd_sum_heat'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_heat'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mb_volume_drainage'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pd_volume_drainage'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_drainage'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mb_sum_drainage'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pd_sum_drainage'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_drainage'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mb_volume_negative'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pd_volume_negative'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_negative'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mb_sum_negative'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pd_sum_negative'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_negative'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mb_volume_water'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pd_volume_water'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_water'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mb_sum_water'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pd_sum_water'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_water'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mb_volume_power'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pd_volume_power'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_power'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mb_sum_power'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pd_sum_power'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_power'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mb_volume_trash'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pd_volume_trash'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_trash'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mb_sum_trash'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pd_sum_trash'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_trash'], 2, ',', ' ') }}</td>
                                              
                                    <td><font color="Red">{{ number_format($value['total'], 2, ',', ' ') }}</td>
                                </tr>
                            @else
                                <tr>
                                    <th><font color="RoyalBlue">{{ $value['user']['name'] }}</th>
                                    <td></td>                                  
                                    <td></td>                                  
                                    <td><font color="blue">{{ number_format($value['mbvolume_heat'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pdvolume_heat'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_heat'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mbsum_heat'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pdsum_heat'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_heat'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mbvolume_drainage'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pdvolume_drainage'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_drainage'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mbsum_drainage'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pdsum_drainage'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_drainage'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mbvolume_negative'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pdvolume_negative'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_negative'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mbsum_negative'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pdsum_negative'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_negative'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mbvolume_water'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pdvolume_water'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_water'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mbsum_water'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pdsum_water'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_water'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mbvolume_power'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pdvolume_power'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_power'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mbsum_power'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pdsum_power'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_power'], 2, ',', ' ') }}</td>
                                    
                                    <td><font color="blue">{{ number_format($value['mbvolume_trash'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['pdvolume_trash'], 4, ',', ' ') }}</td>
                                    <td><font color="blue">{{ number_format($value['volume_trash'], 4, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['mbsum_trash'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['pdsum_trash'], 2, ',', ' ') }}</td>
                                    <td><font color="Red">{{ number_format($value['sum_trash'], 2, ',', ' ') }}</td>
                                              
                                    <td><font color="Red">{{ number_format($value['total'], 2, ',', ' ') }}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <th><font color="RoyalBlue">Итог</th>
                            <td></td>                                  
                            <td></td>                                  
                            <td><font color="blue">{{ number_format($info['total']['mbvolume_heat'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['pdvolume_heat'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['volume_heat'], 4, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['mbsum_heat'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['pdsum_heat'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['sum_heat'], 2, ',', ' ') }}</td>

                            <td><font color="blue">{{ number_format($info['total']['mbvolume_drainage'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['pdvolume_drainage'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['volume_drainage'], 4, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['mbsum_drainage'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['pdsum_drainage'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['sum_drainage'], 2, ',', ' ') }}</td>

                            <td><font color="blue">{{ number_format($info['total']['mbvolume_negative'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['pdvolume_negative'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['volume_negative'], 4, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['mbsum_negative'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['pdsum_negative'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['sum_negative'], 2, ',', ' ') }}</td>

                            <td><font color="blue">{{ number_format($info['total']['mbvolume_water'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['pdvolume_water'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['volume_water'], 4, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['mbsum_water'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['pdsum_water'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['sum_water'], 2, ',', ' ') }}</td>

                            <td><font color="blue">{{ number_format($info['total']['mbvolume_power'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['pdvolume_power'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['volume_power'], 4, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['mbsum_power'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['pdsum_power'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['sum_power'], 2, ',', ' ') }}</td>

                            <td><font color="blue">{{ number_format($info['total']['mbvolume_trash'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['pdvolume_trash'], 4, ',', ' ') }}</td>
                            <td><font color="blue">{{ number_format($info['total']['volume_trash'], 4, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['mbsum_trash'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['pdsum_trash'], 2, ',', ' ') }}</td>
                            <td><font color="Red">{{ number_format($info['total']['sum_trash'], 2, ',', ' ') }}</td>

                            <td><font color="Red">{{ number_format($info['total']['total'], 2, ',', ' ') }}</td>
                        </tr>
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
    </body>
</html>



