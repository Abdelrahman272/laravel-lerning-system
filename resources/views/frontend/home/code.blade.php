<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr.Mostafa Qottb</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.rtl.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
</head>

<body>
    <header>
        <div class="container">
            <a href="{{ route('welcome') }} " class="logo">
                <span>M</span>onsieur Moustafa
                <br>
                <span>الموقع الرسمي لاستاذ مصطفى قطب</span>
            </a>
            <ul class="navbar-nav flex-row ">
                <li><a class="nav-link" href="{{ route('welcome') }}">الرئيسية</a></li>
                <li><a class="nav-link" href="{{ route('logout') }}">تسجيل خروج</a></li>
            </ul>
            {{-- <div class="dropdown bars-login">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="nav-link dropdown-item" href="#">الرئيسية</a>
                    </li>
                    <li><a class="nav-link dropdown-item" href="#">تسجيل خروج</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </header>

    <body>

        <section class="code-page my-5">
            <div class="container">
                <div class="text">
                    <h3 class="title-section">ادخل كود التفعيل هنا</h3>
                </div>
                <div class="row">
                    @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif

                    <div class="col-lg-6">
                        <form method="POST" action="{{ route('submitCode') }}">
                            @csrf
                            <div>
                                <label class="form-label">ادخل الكود هنا</label>
                                <input type="text" name="code" class="form-control">
                                <div class="form-text">لا تشارك هذا الكود مع شخص اخر</div>
                            </div>
                            <button type="submit" type="submit" class="btn btn-primary">تسجيل</button>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="text">
                            <p>حسابك يحتاج للتفعيل : <br /> يجب عليك شراء الكود من السنتر وادخالة ليتم فتح المنصة</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.layouts.footer')


        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/inspect.js') }}"></script>
        <script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    </body>

</html>
