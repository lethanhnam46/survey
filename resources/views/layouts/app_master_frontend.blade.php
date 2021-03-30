<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Khảo sát trang phục áo chống nắng</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{	asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css')}}">
        <!-- Pace style -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/pace/pace.min.css')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Khảo sát trang phục áo chống nắng</h3>
          </div>
          <div class="box-body">
            Cần khảo sát một số thuộc tính của trang phục áo chống nắng
          </div>
        @yield('form-content')
        </div>
        <footer class="main-footer">
            <strong>Liên hệ: <a href="https://facebook.com/lethanhnam46"> Facebook của tôi </a></strong> 
        </footer>
        
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- PACE -->
        <script src="{{ asset('admin/bower_components/PACE/pace.min.js')}}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('admin/dist/js/demo.js')}}"></script>

    </body>
</html>