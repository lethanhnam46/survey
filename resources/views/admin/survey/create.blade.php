@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <section class="content-header">
        <h1>
            Thêm mới khảo sát
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="{{ route('survey.index')}}">Khảo sát</a></li>
            <li class="active">tạo mới</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                        @csrf
                        {{-- <div class="form-group {{ $errors->first('survey_name') ? 'has-error' : ''}} col-sm-3 " >
                        <label for="name"> Tên cuộc khảo sát <span class="text-danger">(**)</span></label>
                        <input type="text" class="form-control" name='survey_name' placeholder="Nhập tên khảo sát ...">
                        @if ($errors->first('survey_name'))
                        <span class="text-danger">{{$errors->first('survey_name')}}</span>
                        @endif
                    </div> --}}
                        <div class="col-sm-12">
                            <div class="form-group col-sm-4 ">
                                <label for="name"> Tên cuộc khảo sát </label>
                                <input type="text" class="form-control" name='survey_name'
                                    placeholder="Nhập tên khảo sát ...">
                            </div>
                            <div class="col-sm-6">
                                <label for="name"> Ghi chú </label>
                                <input type="text" class="form-control" name='note' placeholder="Nhập ghi chú ...">
                            </div>
                            <div class="col-sm-2">
                                <label for="name"> Mức độ đánh giá</label>
                                <input type="text" class="form-control" name='level' placeholder="Nhập mức độ ...">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <label class="control-label" for="pp">Thuộc tính</label>
                                <input class="form-control" id="pp_1" name="pp_1" type="text"
                                    placeholder="Nhập thuộc tính 1" />
                                <button id="b1" class="btn btn-info add-pp" type="button">Thêm thuộc tính</button>
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label" for="pt">Nhập mẫu vẽ</label>
                                <input type="file" id="pt_1" name="pt_1">
                                <button id="b1" class="btn btn-info add-pt" type="button"> Thêm mẫu</button>
                            </div>
                            <div class="col-sm-2"> </div>
                            <div class="box-footer text-center, col-sm-4">
                                <a href="{{ route('survey.index') }}" class="btn btn-danger"> <i class="fa fa-undo"></i>
                                    Quay
                                    lại</a>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i>Thêm dữ
                                    liệu</button>
                            </div>
                        </div>


                    </form>
                </div>


            </div>
        </div>

        <script>
            $(document).ready(function() {
                var next = 1;
                $(".add-pp").click(function(e) {
                    e.preventDefault();
                    var addto = "#pp_" + next;
                    next = next + 1;
                    var newIn = '<br /><input class="form-control" id="pp_' + next + '" name="pp_' + next +
                        '" type="text" placeholder="Nhập thuộc tính ' + next + '"/>';
                    var newInput = $(newIn);
                    $(addto).after(newInput);
                    $("#count").val(next);
                });
            });
            $(document).ready(function() {
                var next = 1;
                $(".add-pt").click(function(e) {
                    e.preventDefault();
                    var addto = "#pt_" + next;
                    next = next + 1;
                    var newIn = '<br /><input type="file" id="pt_' + next + '" name="pt_' + next + '""/>';
                    var newInput = $(newIn);
                    $(addto).after(newInput);
                    $("#count").val(next);
                });
            });

        </script>
    </section>
    <!-- /.content -->
@endsection
