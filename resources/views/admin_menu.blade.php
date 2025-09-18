<div class="col-md-2">
    <div class="top-category text-center no-border-left">
        <h3><a href="{{ route('delo-out')}}">Дело</a></h3>
        <span class="icon flaticon-contact"></span>
        <p><span class="number"></span> <span>Регистрация корреспонденции</span></p>
    </div>
</div>
<div class="col-md-2">
    <div class="top-category text-center">
        <h3><a href="{{ route('utilities-admin')}}">Коммуналка</a></h3>
        <span class="icon flaticon-accounting"></span>
        <p><span class="number"></span> <span>Модуль в разработке</span></p>
    </div>
</div>
<div class="col-md-2">
    <div class="top-category text-center">
        <h3><a href="{{ route('communal-admin')}}">Архив</a></h3>
        <span class="icon flaticon-accounting"></span>
        <p><span class="number"></span> <span>Коммуналка 2018-2025</span></p>
    </div>
</div>
<div class="col-md-2">
    <div class="top-category text-center">
        <h3><a href="#">ОФС 2026</a></h3>
        <span class="icon flaticon-accounting"></span>
        <p><span class="number"></span> <span>Модуль в разработке</span></p>
    </div>
</div>
<div class="col-md-2">
    <div class="top-category text-center">
        <h3><a href="{{ route('archive-admin')}}">Архив</a></h3>
        <span class="icon flaticon-contact"></span>
        <p><span class="number"></span> <span>Архив ОФС</span></p>
    </div>
</div>
<div class="col-md-2">
    <div class="top-category text-center">
        <h3><a href="#" onclick="myFunction()">Администратор</a></h3>
        <span class="icon flaticon-contact"></span>
        <p><span class="number"></span> <span>Open position</span></p>
        <script>
        function myFunction() {
            let code = prompt('Введите код доступа!', );
            window.location.href = '/portal/public/administrator?code='+code;
        }
        </script>
    </div>
</div>
