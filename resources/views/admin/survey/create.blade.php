@extends('layouts.app_master_admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm mới danh mục sản phẩm
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">Category</a></li>
        <li class="active">Create</li>
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
                    <div class="form-group {{ $errors->first('survey_name') ? 'has-error' : ''}}, col-sm-8 " >
                        <label for="name"> Tên cuộc khảo sát <span class="text-danger">(**)</span></label>
                        <input type="text" class="form-control" name='survey_name' placeholder="Nhập tên khảo sát ...">
                        @if ($errors->first('survey_name'))
                        <span class="text-danger">{{$errors->first('survey_name')}}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="name"> Note </label>
                        <input type="text" class="form-control" name='note' placeholder="Nhập ghi chú ...">
                    </div>
                    <div class="box-footer text-center, col-sm-12">
                        <a href="{{ route('survey.index')}}" class="btn btn-danger"> <i class="fa fa-undo"></i> Quay lại</a>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i>Lưu dữ liệu</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
            <!-- /.box -->
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection