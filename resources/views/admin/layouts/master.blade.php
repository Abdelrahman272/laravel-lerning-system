<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    @include('admin.layouts.heade')
</head>

<body class="hold-transition sidebar-mini layout-fixed rtl">
    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('backend/assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            @include('admin.layouts.main-headerbar')

            @include('admin.layouts.main-sidebar')

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">@yield('title-one')</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('title-two')</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        @yield('content')

                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>


        @include('admin.layouts.footer')

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    @include('admin.layouts.footer-scripts')

</body>

</html>
