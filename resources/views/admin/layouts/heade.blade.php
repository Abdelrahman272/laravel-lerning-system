<!-- TITLE -->
<title>@yield('title')</title>

<!-- FAVICON -->
<link href="{{ asset('backend/assets/images/brand/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
<!-- BOOTSTRAP CSS -->
<link id="style" href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

<!-- STYLE CSS -->
<link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/dark-style.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/transparent-style.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/skin-modes.css') }}" rel="stylesheet" />

<!--- FONT-ICONS CSS -->
<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" />

<!-- COLOR SKIN CSS -->
<link id="theme" rel="stylesheet" type="text/css" media="all"
    href="{{ asset('backend/assets/colors/color1.css') }}" />

@yield('css')
