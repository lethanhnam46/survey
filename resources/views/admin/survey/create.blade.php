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
				            <div class="col-sm-8">
				            	<div class="form-group {{ $errors->first('c_name') ? 'has-error' : ''}} ">
				                <label for="name">Name <span class="text-danger">(**)</span></label>
				                <input type="text" class="form-control" name='c_name' placeholder="Enter Name ...">
                                @if ($errors->first('c_name'))
                                    <span class="text-danger">{{$errors->first('c_name')}}</span>

                                @endif
				            </div>

				          
				        <!-- /.box-body -->
				        
				            </div>
				            <div class="col-sm-4"></div>
				            <div class="col-sm-12">
				            	<div class="box-footer text-center">
				           			<a href="{{ route('admin.category.index')}}" class="btn btn-danger"> <i class="fa fa-undo"></i> Quay lại</a>
				           			<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i>Lưu dữ liệu</button>
				        		</div>
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