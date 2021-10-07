<!DOCTYPE html>
<html lang="fa" dir="rtl" class="rtl">

<head>
    @include('layout.head')
    @yield('head')
</head>

<body class="active-ripple theme-blue fix-header sidebar-extra">

<!-- BEGIN LOEADING -->
<div id="loader">
    <div class="spinner"></div>
</div><!-- /loader -->
<!-- END LOEADING -->

@include('layout.navbar')

<!-- BEGIN WRAPPER -->
<div id="wrapper">

    @include('layout.sidebar')
    @yield('content')

</div><!-- /#wrapper -->
<!-- END WRAPPER -->

@include('layout.footer')
@include('layout.setting')

@include('layout.script')
@yield('script')

</body>

</html>
