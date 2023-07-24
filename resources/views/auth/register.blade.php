<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="ادخل بياناتك بشكل صحيح للحصول على أفضل تجربة داخل الموقع. الاسم الأول. الاسم الأخير. رقم الهاتف. رقم هاتف ولي الأمر. أنشئ حسابًا مجانيًا.">
    <title>Mr.Mostafa | Sign Up </title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.rtl.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
</head>

<body>
    <header>
        <div class="container">
            <a href="./results.html" class="logo">
                <span>M</span>onsieur Moustafa
                <br>
                <span>الموقع الرسمي لاستاذ مصطفى قطب</span>
            </a>
            <ul class="navbar-nav flex-row">
                <li><a class="nav-link" href="{{ route('welcome') }}">الرئيسية</a></li>
                <li><a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a></li>
            </ul>
            <div class="dropdown bars-login">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="nav-link dropdown-item" href="{{ route('welcome') }}">الرئيسية</a>
                    </li>
                    <li><a class="nav-link dropdown-item" href="{{ route('login') }}">تسجيل دخول</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <section class="sign_up-page">
        <div class="container">
            <div class="text text-center">
                <h3 class="title-section">قم بإنشاء حسابك الإلكتروني</h3>
                <p><a class="me-1" href="{{ route('login') }}">لديك حساب ؟</a> قم بتسجيل الدخول لحسابك</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row row mb-4">
                    <div class="col-md-6 form-group text-right">
                        <input name="name" autofocus type="text" id="name" class="form-control"
                            placeholder="اسم الطالب / الطالبه" />
                        <small id="name_help" class="form-text">الاسم رباعى باللغة العربية</small>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group text-right">
                        <select name="level_id" id="level_id" class="form-select">
                            <option value="">Select Level</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('level_id'))
                            <span class="text-danger">{{ $errors->first('level_id') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group text-right">
                        <input name="phone" type="text" maxlength="12" id="phone" class="form-control"
                            placeholder="رقم هاتف الطالب" />
                        <small id="phone_help" class="form-text">يتوفر عليه واتساب ويستخدم لتسجيل طالب واحد فقط</small>
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group text-right">
                        <input name="parent_phone" type="text" maxlength="11" id="parent_phone" class="form-control"
                            placeholder="رقم ولي الامر" />
                        @if ($errors->has('parent_phone'))
                            <span class="text-danger">{{ $errors->first('parent_phone') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group text-right">
                        <input name="password" type="password" id="password" class="form-control"
                            placeholder="كلمة المرور" />
                        <small id="passHelp" class="form-text"> يسمح بحروف وأرقام انجليزية فقط</small>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group text-right">
                        <input name="password_confirmation" type="password_confirmation" id="password_confirmation"
                            class="form-control confirm" placeholder="تاكيد كلمة المرور" /><br />
                    </div>
                    <div class="error-message text-center mt-2"></div>
                    <button type="submit" class="text-center">انشاء حساب</button>
                </div>
            </form>
            <div class="image">
                <img class="img-fluid mt-2" src="assets/imgs/sign_up.svg" alt="">
            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')


    <script src="assets/js/inspect.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/js/validation.js"></script>
</body>

</html>
