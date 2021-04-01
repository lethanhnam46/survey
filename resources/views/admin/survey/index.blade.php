@extends('layouts.app_master_admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý khảo sát hiện tại
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">Survey</a></li>
        <li class="active">List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
        	<div class="box-header">
              <h3 class="box-title"> <a href="" class="btn btn-primary"> <i class="fa fa-plus"></i> Thêm mới</a></h3>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th> Name </th>
                                    <th> Start Time </th>
                                    <th> End Time </th>
                                    <th> Action </th>
                                    <th> Note </th>
                                    <th> Chi tiết </th>
                                </tr>
                                @if ($surveys)
                                    @foreach($surveys as $survey)
                                    <tr>
                                        <td> {{ $survey->id }} </td>
                                        <td> {{ $survey->survey_name }} </td>
                                        <td> {{ $survey->start_time }} </td>
                                        <td> {{ $survey->end_time }} </td>
                                        <td>
                                            @if ($survey->del_flag==1)
                                                <a href="{{route('survey.active', $survey->id)}}" class="label label-info"> Show</a>
                                            @else
                                                <a href="{{route('survey.active', $survey->id)}}" class="label label-default"> Hiden</a>
                                            @endif
                                        </td>
                                        <td> {{ $survey->note }} </td>
                                        <td> <a href=""> Xem</a> </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {!! $surveys->links() !!}
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection