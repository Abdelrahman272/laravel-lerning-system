<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="منصة استاذ مصطفى، تسجيل دخول، رقم الموبايل، كلمة المرور" />
    <meta name="robots" content="noindex" />
    <title>Mr.Mostafa | Login</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.rtl.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
</head>

<body>
    <header>
        <div class="container">
            <a href="{{ route('welcome') }} " class="logo">
                <span>M</span>onsieur Moustafa
                <br />
                <span>الموقع الرسمي لاستاذ مصطفى قطب</span>
            </a>
            <ul class="navbar-nav flex-row">
                <li><a class="nav-link" href="{{ route('welcome') }}">الرئيسية</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">حساب جديد</a></li>
            </ul>
            <div class="dropdown bars-login">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="nav-link dropdown-item" href="{{route('welcome')}}">الرئيسية</a>
                    </li>
                    <li>
                        <a class="nav-link dropdown-item" href="{{ route('register') }}">حساب جديد</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="login-page mb-5">
        <div class="container">
            <div class="text">
                <h3 class="title-section">قم بتسجيل حسابك الإلكتروني</h3>
                <p>
                    <a class="me-1" href="{{ route('register') }}">ليس لديك حساب ؟</a> قم بتسجيل الدخول لحسابك
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input name="phone" type="text" class="mb-3" autofocus required
                            placeholder="رقم هاتف الطالب" />
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif

                        <input name="password" class="input-two" required type="password" placeholder="كلمة المرور" />
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <div class="log-links">
                            <a href="{{ route('password.request') }}" class="forget-pass">نسيت كلمة المرور؟</a>
                            <button type="submit" class="sumbit-pass text-center">تسجيل الدخول</button>
                        </div>
                    </form>
                    <a href=""></a>
                </div>
                <div class="col-lg-8">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('frontend/assets/imgs/sign_up.svg') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layouts.footer')

    <script src="{{ asset('frontend/assets/js/inspect.js') }}"></script>
    <script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
