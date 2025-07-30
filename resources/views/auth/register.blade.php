<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Форма регистрации</title>  
        <link rel="stylesheet" href="{{ asset('assets/css/reg_style.css') }}">
    </head>

    <body>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <div class="container">
            <div class="frame">
                <form class="form-signin" action="{{ route('register') }}" method="post">
                    @csrf
                    <label for="username">Имя</label>
                    <input id="name" type="text" class="form-styling @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Введите Имя" />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="username">Почта</label>
                    <input id="email" type="email" class="form-styling @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ваш E-mail" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="password">Пароль</label>
                    <input id="password" type="password" class="form-styling @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Введите пароль"/>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="password">Повторите пароль</label>
                    <input id="password-confirm" type="password" class="form-styling" name="password_confirmation" required autocomplete="new-password" placeholder="Повторите пароль"/>

                    <label></label>
                    <label></label>
                    <input type="submit" class="elongated-rounded-button" value="ЗАРЕГИСТРИРОВАТЬ" />
                </form>
            </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
        <script src="{{ asset('assets/js/reg_js.js') }}"></script>
    </body>
</html>
