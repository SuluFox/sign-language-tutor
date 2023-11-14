
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
</head>

<body>
    <section class="forms-section">
        <h1 class="section-title">SignLingo</h1>
        <div class="forms">
            <div class="form-wrapper is-active">
                <button type="button" class="switcher switcher-login">
                    Login
                    <span class="underline"></span>
                </button>
                <form class="form form-login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <fieldset>
                        <legend>Please, enter your email and password for login.</legend>
                        <div class="input-block">
                            <label for="login-email">E-mail</label>
                            <input id="login-email" type="email" required
                                class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-block">
                            <label for="login-password">Password</label>
                            <input id="login-password" type="password" class="@error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">

                        </div>
                    </fieldset>
                    <button type="submit" class="btn-login">Login</button>
                </form>
            </div>
            <div class="form-wrapper">
                <button type="button" class="switcher switcher-signup">
                    Sign Up
                    <span class="underline"></span>
                </button>
                <form class="form form-signup" method="POST" action="{{ route('register') }}">
                    @csrf
                    <fieldset>
                        <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                        <div class="input-block">
                            <label for="signup-email">Name</label>
                            <input id="signup-name" type="text" class=" @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-block">
                            <label for="signup-email">E-mail</label>
                            <input id="signup-email" type="email" class=" @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-block">
                            <label for="signup-password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-block">
                            <label for="signup-password-confirm">Confirm password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </fieldset>
                    <button type="submit" class="btn-signup">Continue</button>
                    </>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/loginapp.js') }} "></script>
</body>

</html>
