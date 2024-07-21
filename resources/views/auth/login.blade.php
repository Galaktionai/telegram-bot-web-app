@extends('layouts.app')

@section('content')
<div class="loader">
    <div class="loader_inner"></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" id="authorization-form" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="telegram_id" class="col-md-4 col-form-label text-md-end">{{ __('Telegram_id Address') }}</label>

                            <div class="col-md-6">
                                <input id="telegram-id-login" type="telegram_id" class="form-control @error('telegram_id') is-invalid @enderror" name="telegram_id" value="{{ old('telegram_id') }}" required autocomplete="telegram_id" autofocus>

                                @error('telegram_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" id="register-form" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telegram_id" class="col-md-4 col-form-label text-md-end">telegram_id</label>

                            <div class="col-md-6">
                                <input id="telegram_id" type="text" class="form-control @error('telegram_id') is-invalid @enderror" name="telegram_id" value="{{ old('telegram_id') }}" required autocomplete="telegram_id" autofocus>

                                @error('telegram_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telegram_id" class="col-md-4 col-form-label text-md-end">first_name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('telegram_id') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">last_name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="telegram_id" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo_url" class="col-md-4 col-form-label text-md-end">photo_url</label>

                            <div class="col-md-6">
                                <input id="photo_url" type="text" class="form-control @error('photo_url') is-invalid @enderror" name="photo_url" value="{{ old('photo_url') }}" required autocomplete="telegram_id" autofocus>

                                @error('photo_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-register" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.loader {
  background: none repeat scroll 0 0 #fff;
  height: 100%;
  width: 100%;
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  z-index: 9999;
}
.loader .loader_inner {
  animation: animate 1.5s linear infinite;
  clip: rect(0, 80px, 80px, 40px);
  height: 80px;
  width: 80px;
  position: absolute;
  left: calc(50% - 40px);
  top: calc(50% - 40px);
}
@keyframes animate {
  0% {
    transform: rotate(0deg)
  }
  100% {
    transform: rotate(220deg)
  }
}
.loader .loader_inner:after {
  animation: animate2 1.5s ease-in-out infinite;
  clip: rect(0, 80px, 80px, 40px);
  content:'';
  border-radius: 50%;
  height: 80px;
  width: 80px;
  position: absolute;
}
@keyframes animate2 {
  0% {
    box-shadow: inset #b3dfd8 0 0 0 17px;
    transform: rotate(-140deg);
  }
  50% {
    box-shadow: inset #b3dfd8 0 0 0 2px;
  }
  100% {
    box-shadow: inset #b3dfd8 0 0 0 17px;
    transform: rotate(140deg);
  }
}
</style>
<script src="https://telegram.org/js/telegram-web-app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    window.Telegram.WebApp.ready();

    $(window).on("load", function() {
        $(".loader_inner").fadeOut();
        $(".loader").delay(400).fadeOut("slow");

        const user = window.Telegram.WebApp.initDataUnsafe.user;

        const authorizationForm = document.getElementById('authorization-form')
        const registerForm = document.getElementById('register-form')

        if (user) {
            const registerUsers = axios.get('http://127.0.0.1:8000/api/users').then((r) => {
                let users = r.data.data
                users.forEach(element => {
                    if(element.telegram_id == user.id) {
                        const emailInput = document.getElementById('email');
                        const passwordInput = document.getElementById('password');

                        emailInput.value = element.telegram_id;
                        passwordInput.value = element.telegram_id;

                        authorizationForm.submit();
                    } else {
                        const nameInput = document.getElementById('name');
                        const telegramIdInput = document.getElementById('telegram_id');
                        const passwordRegister = document.getElementById('password-register');
                        const passwordСonfirm = document.getElementById('password-confirm');
                        const firstNameInput = document.getElementById('first_name');
                        const lastNamePassword = document.getElementById('last_name');
                        const photoUrlInput = document.getElementById('photo_url');

                        nameInput.value = user.username;
                        telegramIdInput.value = user.id;
                        passwordRegister.value = user.id;
                        passwordСonfirm.value = user.id;

                        firstNameInput.value = user.first_name;
                        lastNamePassword.value = user.last_name;
                        photoUrlInput.value = user.photo_url;

                        registerForm.submit();
                    }
                });
            })
        } else {
            console.log('Error')
        }
    });
</script>
@endsection
