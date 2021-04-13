<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ $data['name'] }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
    <!-- Pace style -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/pace/pace.min.css') }}">
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
    <header class="box box-default">
        <div class="box-header with-border"style="text-align: center">
            <h3 class="box-title" >{{ $data['name'] }}</h3>
        </div>
        <div class="box-body" style="text-align: center">
            {{ $data['note'] }}
        </div>
    </header>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <form action="{{ route('survey.action') }}" method="POST" id="mainForm">
                    @csrf
                    @php
                        $prototypes = [
                            1 => 'Mẫu 1',
                            2 => 'Mẫu 2',
                            3 => 'Mẫu 3',
                            4 => 'Mẫu 4',
                            5 => 'Mẫu 5',
                            6 => 'Mẫu 6',
                        ];
                        $properties = [
                            1 => 'Thuộc tính 1',
                            2 => 'Thuộc tính 2',
                            3 => 'Thuộc tính 3',
                            4 => 'Thuộc tính 4',
                            5 => 'Thuộc tính 5',
                            6 => 'Thuộc tính 6',
                            7 => 'Thuộc tính 7',
                            8 => 'Thuộc tính 8',
                            9 => 'Thuộc tính 9',
                            10 => 'Thuộc tính 10',
                            11 => 'Thuộc tính 11',
                            12 => 'Thuộc tính 12',
                        ];
                        $levels = 6;
                    @endphp
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                            <tr>
                                {{-- for các mẫu --}}
                                <th></th>
                                @foreach ($prototypes as $keyPrototypes => $namePrototype)
                                    <th>{{ $namePrototype }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $keyProperties => $nameProperties)
                                <tr>
                                    <td>{{ $nameProperties }}</td>
                                    @foreach ($prototypes as $keyPrototypes => $namePrototype)
                                        <td>
                                            @for ($i = 0; $i < $levels; $i++)
                                                <input type="radio"
                                                    name="pp_{{ $keyPrototypes }}_{{ $keyProperties }}" id=""
                                                    value="{{ $i }}" />
                                            @endfor
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
					<div style="text-align: center">
                    <button type="submit" id="btnSubmit" class="btn btn-primary" >Submit</button>
					</div>
                </form>
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <strong>Liên hệ: <a href="https://facebook.com/lethanhnam46"> Facebook của tôi </a></strong>
    </footer>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- PACE -->
    <script src="{{ asset('admin/bower_components/PACE/pace.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
</body>

</html>
