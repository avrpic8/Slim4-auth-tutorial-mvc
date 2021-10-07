<!DOCTYPE html>
<html lang="fa" dir="rtl" class="rtl">

<head>

    <!-- BEGIN CSS -->
    <link href="assets/plugins/bootstrap/bootstrap5/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/simple-line-icons/css/simple-line-icons.min.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet">
    <link href="assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="assets/plugins/paper-ripple/dist/paper-ripple.min.css" rel="stylesheet">
    <link href="assets/plugins/iCheck/skins/square/_all.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/colors.css" rel="stylesheet">
    <!-- END CSS -->

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


    <!-- BEGIN PAGE CONTENT -->
        <div id="page-content">
            <div class="row">
                <!-- BEGIN BREADCRUMB -->
                <div class="col-md-12">
                    <div class="breadcrumb-box border shadow">
                        <ul class="breadcrumb">
                            <li><a href="dashboard.html">پیشخوان</a></li>
                            <li><a href="#">صفحات</a></li>
                            <li class="active">صفحه خام</li>
                        </ul>
                        <div class="breadcrumb-left">
                            سه شنبه، 1400/04/29
                            <i class="icon-calendar"></i>
                        </div><!-- /.breadcrumb-left -->
                    </div><!-- /.breadcrumb-box -->
                </div><!-- /.col-md-12 -->
                <!-- END BREADCRUMB -->

                <div class="col-12">
                    <div class="portlet box border shadow">
                        <div class="portlet-heading">
                            <div class="portlet-title">
                                <h3 class="title">
                                    <i class="icon-note"></i>
                                    تیتر صفحه
                                </h3>
                            </div><!-- /.portlet-title -->
                            <div class="buttons-box">
                                <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                                    <i class="icon-size-fullscreen"></i>
                                </a>
                                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                                    <i class="icon-arrow-up"></i>
                                </a>
                            </div><!-- /.buttons-box -->
                        </div><!-- /.portlet-heading -->
                        <div class="portlet-body">
                            <div>
                                این یک صفحه خالی  است، همین الان این تگ را پاک کنید و صفحه فوق العاده خود را با کمک سایر صفحات قالب بسازید.
                            </div>
                        </div><!-- /.portlet-body -->
                    </div><!-- /.portlet -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /#page-content -->
        <!-- END PAGE CONTENT -->

    @yield('content')

</div><!-- /#wrapper -->
<!-- END WRAPPER -->

<div class="row footer-container">
    <div class="col-md-12">
        <div class="copyright">
            <p class="float-start">
                کلیه حقوق قالب مدیران محفوظ می باشد و کپی برداری از آن به هیچ عنوان جایز نیست.
            </p>
            <p class="float-end ltr tahoma">
                <span>©</span>
                <a href="http://www.rayanik.com" target="_blank">Rayanik</a>
            </p>
        </div><!-- /.copyright -->
    </div><!-- /.col-md-12 -->
</div><!-- /.row -->


@include('layout.setting')


<!-- BEGIN JS -->
<script src="assets/plugins/jquery/dist/jquery-3.1.0.js"></script>
<script src="assets/plugins/bootstrap/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/metisMenu/dist/metisMenu.min.js"></script>
<script src="assets/plugins/paper-ripple/dist/PaperRipple.min.js"></script>
<script src="assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="assets/plugins/screenfull/dist/screenfull.min.js"></script>
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script src="assets/plugins/switchery/dist/switchery.js"></script>
<script src="assets/js/core.js"></script>

@yield('script')

</body>

</html>