<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Аутентификация</title>
        <link rel="stylesheet" href="{{ asset('assets/css/reg_style.css') }}">
    </head>
    
    <body>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <div class="container">
            <div class="frame">
                <div class="nav">
                    <ul class"links">
                        <li class="signin-active"><a>Вход в личный кабинет</a></li>
                    </ul>
                </div>

                <form class="form-signin" action="{{ route('login') }}" method="post">
                    @csrf
                    <label for="username">Учётная запись</label>
                    <input id="email" class="form-styling" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Введите Вашу электронную почту">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                    <label for="password">Пароль</label>
                    <input id="password" type="password" class="form-styling" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Введите Ваш пароль">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label></label>
                    <label></label>
                    <input type="submit" class="elongated-rounded-button" value="ВОЙТИ" />
                </form>

                <form class="form-signup" action="" method="post" name="form">
                </form>

                <div class="success">
                </div>

                <div class="forgot">
                    <a href="#">Забыли пароль?</a>
                </div>
            </div>
        </div>
        
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
        <script src="{{ asset('assets/js/reg_js.js') }}"></script>
    </body>
</html>
