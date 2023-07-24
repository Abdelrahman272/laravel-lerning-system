<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    @include('frontend.layouts.head-css')

</head>


<body>
    <div id="top" class="align-items-center rounded justify-content-center text-white fs-4">
        <i class="fa-solid fa-angle-up"></i>
    </div>

    @include('frontend.layouts.navbar')

    @yield('content')

    @include('frontend.layouts.footer')

    @include('frontend.layouts.footer-script')
</body>

</html>
