@extends('frontend.layouts.master')


@section('css')

@endsection

@section('الرئيسية')

@endsection



@section('content')
<div class="home-page">
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
@endsection

@section('js')

@endsection
