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
                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group col-sm-3 ">
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
                                <select name="level" class="form-control">
                                  <option selected value="5">5</option>
                                  <option value="7">7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4" style="text-align: center">
                              <table class="table table-bordered" id="tbl_pp">
                                  <tr>
                                    <th>
                                        <label class="control-label" for="pp">Thuộc tính</label>
                                    </th>
                                    <th>
                                        <label class="control-label" for="pp">Trọng số (%)</label>
                                    </th>
                                  </tr>
                                  <tr >
                                    <td>
                                      <input class="form-control" name="pp_1" type="text" placeholder="Nhập thuộc tính 1" />
                                    </td>
                                    <td>
                                      <input class="form-control" name="ts_pp_1" type="text" placeholder="Nhập trọng số thuộc tính 1" />
                                    </td>
                                  </tr>
                              </table>
                              <button class="add_pp btn btn-info" type="button">Thêm thuộc tính</button>
                            </div>
                            <div class="col-sm-2" style="text-align: center">
                              <table class="table table-bordered" id="tbl_pt">
                                <tbody>
                                <th>
                                    <label class="control-label" for="pt">Mẫu thiết kế</label>
                                </th>
                                <tr id='addr_pt'>
                                  <td>
                                     <input class="form-control " type="file" name="pt_1">
                                  </td>
                                </tr>
                                </tbody>
                              </table>
                              <button class="add_pt btn btn-info" type="button"> Thêm mẫu</button>
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
                var i = 2;
                var k = 2;
                $(".add_pp").click(function(e) {
                    $('#tbl_pp').append('<tr><td><input class="form-control" name="pp_'+i+'" type="text" placeholder="Nhập thuộc tính '+i+'"/> </td><td> <input class="form-control" name="ts_pp_'+i+'" type="text" placeholder="Nhập trọng số thuộc tính '+i+' "/> </td></tr>');
                    i++;
                });
                $(".add_pt").click(function(e) {
                    $('#tbl_pt').append('<tr><td><input class="form-control" name="pt_'+k+'" type="file"/></td></tr>');
                    k++;
                });
            });
        </script>
    </section>
    <!-- /.content -->
@endsection
