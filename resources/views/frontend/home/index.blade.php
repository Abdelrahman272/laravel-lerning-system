<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="أهلاً بك في منصة مسيو مصطفى قطب. احجز الآن مع مدرس اللغة الفرنسية للطلاب في المرحلة الثانوية،ومتنساش شعارنا &quot;الدرجة النهائية في جيبك&quot;." />
    <meta name="keywords"
        content="مدرس اللغة الفرنسية, مدرس للغة الفرنسية في المرحلة الثانوية, مصطفى قطب, مصطفى, مصطفى أحمد قطب, دروس اللغة الفرنسية, دروس اللغة الفرنسية عبر الإنترنت, دعم للغة الفرنسية, الاستعداد للاختبارات, أساليب تدريس حديثة, تعلم اللغة الفرنسية بفعالية, مدرس فرنسي يتحدث اللغة العربية, مسيو مصطفى قطب , مسيو مصطفى , french, francais, اللغة الفرنسية, امتحانات فرنساوي ثالثة ثانوي, Mostafa Qottb">
    <!-- Font Awesome -->
    @include('frontend.layouts.head-css')
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-end" style="margin-top: 110px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اهلا ومرحبا </h5>
                </div>
                <div class="modal-body">
                    <p>اهلا بك في الموقع الرسمي للاستاذ / مصطفى قطب معلم اللغة الفرنسية بمحافظة الفيوم</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div id="top" class="align-items-center rounded justify-content-center text-white fs-4">
        <i class="fa-solid fa-angle-up"></i>
    </div>

    <header class="header" id="header">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <span>M</span>onsieur Moustafa
                <br>
                <span>الموقع الرسمي لاستاذ مصطفى قطب</span>
            </a>
            <ul class="navbar-nav flex-row">
                <li><a class="nav-link" href="{{ route('home') }}">الرئيسية</a></li>
                <li><a class="nav-link" href="#lessons">الدروس</a></li>
                <li><a class="nav-link" href="#contact">تواصل معنا</a></li>
            </ul>
            <div class="links-index">
                <div class="links">
                    <a href="{{ route('register') }}">انشاء حساب</a>
                    <a href="{{ route('login') }}" class="login-index">دخول</a>
                </div>
            </div>
            {{-- <div class="dropdown bars-index">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="nav-link dropdown-item" href="#header">الرئيسية</a></li>
                    <li><a class="nav-link dropdown-item" href="#lessons">دروسي</a></li>
                    <li class="pass"><a class="nav-link dropdown-item" href="#contact">تواصل معنا</a></li>
                    <li><a class="nav-link dropdown-item" href="sign-up.html"> انشاء حساب</a></li>
                    <li><a class="nav-link dropdown-item" href="login.html">تسجيل دخول </a></li>
                </ul>
            </div> --}}
        </div>
    </header>
    <div class="home-page" id="home">
        <section class="landing" id="landing">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text text-center animate-bottom-1">
                            <h3>تعلم الفرنسية</h3>
                            <p>تعلم واتقن الفرنسية مع <br> <span>مصطفى قطب</span> أستاذ اللغة <br> الفرنسية</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image animate-bottom-2" id="img-animation">
                            <img class="man layer" data-speed="3" src="{{ asset('frontend/assets/imgs/man1.svg') }}"
                                alt="">
                            <img class="woman1 layer" data-speed="4"
                                src="{{ asset('frontend/assets/imgs/woman1.svg') }}" alt="">
                            <img class="woman2 layer" data-speed="2"
                                src="{{ asset('frontend/assets/imgs/woman2.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="cards">
                            <img src="{{ asset('frontend/assets/imgs/Video Presentation.svg') }}" alt="">
                            <div class="text">
                                <h4 class="text-center">ادرس</h4>
                                <p class="text-center">ادرس بالطرق الحديثة وتميز عن زملائك</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="cards">
                            <img src="{{ asset('frontend/assets/imgs/Video.svg') }}" alt="">
                            <div class="text">
                                <h4 class="text-center">احدث الدروس</h4>
                                <p class="text-center">احجز كل دروسك بسهولة </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="cards">
                            <img src="{{ asset('frontend/assets/imgs/Exam Time.svg') }}" alt="">
                            <div class="text">
                                <h4 class="text-center">اختبر نفسك</h4>
                                <p class="text-center">اختبر قدراتك باستمرار مع مختلف الامتحانات</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="cards mb-0">
                            <img src="{{ asset('frontend/assets/imgs/Vector.svg') }}" alt="">
                            <div class="text">
                                <h4 class="text-center">اسأل معلمك</h4>
                                <p class="text-center">اطرح اسئلتك واحصل على الأجوبة</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="qoute">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-qoute">
                            <h1>
                                <span>المعلم</span> هو الشمس التي تضيء دروب الحياة بنورها، والبستان الذي ينبت الأجيال
                                ويزرع في قلوبهم العلم والمعرفة، وهو السفير الذي يمثل الوطن في قلوب تلاميذه.
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="lessons py-5" id="lessons">
            <div class="container">
                <div class="title-section">
                    <h2>احدث الدروس</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="image">
                                <img class="img-fluid" src="{{ asset('frontend/assets/imgs/mr.jpg') }}"
                                    alt="">
                                <h5> <i class="fa-regular fa-clock"></i>1 ساعة 11 دقيقة</h5>
                                <div class="run_video">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text">
                                    <h5 class="card-title">درس الضمائر الشخصية</h5>
                                    <p class="card-text">الصف الثالث الثانوي</p>
                                </div>
                                <div class="links mt-3">
                                    <a href="login.html" class="btn">ادخل الكود</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="image">
                                <img class="img-fluid" src="{{ asset('frontend/assets/imgs/mr.jpg') }}"
                                    alt="">
                                <h5> <i class="fa-regular fa-clock"></i>1 ساعة 2 دقيقة</h5>
                                <div class="run_video">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text">
                                    <h5 class="card-title">درس الماضي المركب</h5>
                                    <p class="card-text">الصف الثالث الثانوي</p>
                                </div>
                                <div class="links mt-3">
                                    <a href="login.html" class="btn">ادخل الكود</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="image">
                                <img class="img-fluid" src="{{ asset('frontend/assets/imgs/mr.jpg') }}"
                                    alt="">
                                <h5> <i class="fa-regular fa-clock"></i>55 دقيقة</h5>
                                <div class="run_video">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text">
                                    <h5 class="card-title">درس النفي</h5>
                                    <p class="card-text">الصف الثالث الثانوي</p>
                                </div>
                                <div class="links mt-3">
                                    <a href="login.html" class="btn">ادخل الكود</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="image">
                                <img class="img-fluid" src="{{ asset('frontend/assets/imgs/mr.jpg') }}"
                                    alt="">
                                <h5> <i class="fa-regular fa-clock"></i>54 دقيقة</h5>
                                <div class="run_video">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text">
                                    <h5 class="card-title">درس الامر</h5>
                                    <p class="card-text">الصف الثاني الثانوي</p>
                                </div>
                                <div class="links mt-3">
                                    <a href="login.html" class="btn">ادخل الكود</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="biography py-5" id="biography">
            <div class="container">
                <div class="text">
                    <h3 class="title-section">صور
                    </h3>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="image">
                            <img src="{{ asset('frontend/assets/imgs/biography.jpg') }}" class="img-fluid rounded"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="image">
                            <img src="{{ asset('frontend/assets/imgs/biography2.jpg') }}" class="img-fluid rounded"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="image">
                            <img src="{{ asset('frontend/assets/imgs/biography3.jpg') }}" class="img-fluid rounded"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="contact py-5" id="contact">
            <div class="container">
                <div class="text">
                    <h3 class="title-section">تواصل معنا
                    </h3>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-3">
                        <div class="card text-center">
                            <i class="mt-4 mb-2 fs-2 fa-solid fa-location-dot"></i>
                            <h5 class="mb-2">العنوان</h5>
                            <p class="">المسلة </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center">
                            <i class="mt-4 mb-2 fs-2 fa-solid fa-phone"></i>
                            <h5 class="mb-2">الهاتف</h5>
                            <p class="contact-link">
                                <a href="tel:0842149611">0842149611</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center">
                            <i class="mt-4 mb-2 fs-2 fa-brands fa-facebook"></i>
                            <h5 class="mb-2">فيس بوك</h5>
                            <p class="contact-link">
                                <a href="https://www.facebook.com/m.mostafakotb">ارسل رسالة</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center">
                            <i class="mt-4 mb-2 fs-2 fa-brands fa-whatsapp"></i>
                            <h5 class="mb-2">واتساب</h5>
                            <p class="contact-link">
                                <a href="https://wa.me/201004425415" target="_blank">01004425415</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="question my-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-4">عندك سؤال؟ </h2>
                        <p class="mb-4">احصل على إجابات سريعة ومبسطة لكل اسئلتك وتابع أول بأول مع ميسو <span>مصطفى
                                قطب</span></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('frontend.layouts.footer')

    <script src="assets/js/main.js"></script>
    <script src="assets/js/inspect.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('modal'));
            modal.show();
        });
    </script>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        // Initialize the ScrollReveal instance
        var sr = ScrollReveal();

        // Define the animation configurations with different delay values for .animate-bottom-1 and .animate-bottom-2
        sr.reveal('.animate-bottom-1', {
            origin: 'bottom',
            distance: '50px',
            duration: 1000,
            delay: 300,
            once: true
        });
        sr.reveal('.animate-bottom-2', {
            origin: 'bottom',
            distance: '50px',
            duration: 1000,
            delay: 700,
            once: true
        });

        // Stop the animations after they have been triggered once on small devices
        function stopAnimations() {
            if (window.innerWidth < 768) {
                sr.destroy();
            }
        }

        sr.reveal('.animate-bottom-1, .animate-bottom-2', {
            once: true,
            afterReveal: stopAnimations
        });

        // Check viewport width on window resize
        window.addEventListener('resize', stopAnimations);
    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
