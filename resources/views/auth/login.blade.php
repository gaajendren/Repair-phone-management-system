
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <link rel="stylesheet" href="/public/fonts/material-design-iconic-font.min.css">
    <script src="https://kit.fontawesome.com/ff3606fe13.js" crossorigin="anonymous"></script>
    <!-- Main css -->
    <link href='css/app.css' rel="stylesheet">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>


<main class="py-4">
<!-- Sing in  Form -->
        <section class="sign-in" style="padding: 40px 30px" >
            <div class="container"style="font-family:verdana;">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/signin-image.jpg" alt="sing up image"></figure>
                        <a href="/register" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title" style="font-family:verdana;">Login</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form">
                        @csrf
                            <div class="form-group">
                                <label for="email"></label>
                                <input style="font-family:verdana;" type="text" name="email" id="email" placeholder="Email"class="form-control" name="email" value="" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"></label>
                                <input style="font-family:verdana;" type="password" name="password" id="password" placeholder="Password"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="form-group form-button">
                                <button type="submit"  class="form-submit " style="border:none;" class="form-group form-button">Log in</button>
                                @if (Route::has('password.request'))
                                <br></br>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                
                                @endif
                                
                                
                            
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
        </main>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>



