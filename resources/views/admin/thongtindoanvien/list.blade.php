@extends('admin.layout.index')

@section('content')

<div class="container">
    @include('admin.thongtindoanvien.add')
    @include('admin.thongtindoanvien.edit')
</div>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ THÔNG TIN ĐOÀN VIÊN</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModel">
                <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm
            </button>


            <a href ="admin/thongtindv/downloadExcel/xlsx" style="margin: 5px" class="btn btn-primary export">
                <span class="fa fa-file-export" aria-hidden="true"></span> Xuất thành Exel
            </a>

            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#Import-DoanVien-Model">
                <span class="fa fa-file-import" aria-hidden="true"></span> Nhập từ file Excel
            </button>

{{--            Upload File danh sách Đoàn viên--}}

            <div class="modal fade" id="Import-DoanVien-Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nhập từ file Excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="admin/thongtindv/importExcel" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Upload File Danh sách Đoàn Viên</label>
                                    <input type="file" name="import_file" />
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>MSSV</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Phái</th>
                        <th>Hộ khẩu</th>
                        <th>Ghi chú</th>
                        <th>Tên lớp</th>
                        <th>Số ngày tham gia hoạt động</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ttdv as $tt)
                    <tr>
                        <td>{{$tt->mssv}}</td>
                        <td>{{$tt->hoten}}</td>
                        <td>{{date('d-m-Y', strtotime($tt->ngaysinh))}}</td>
                        <td>
                            @if($tt->phai == 0)
                                {{"Nam"}}
                            @elseif($tt->phai == 1)
                                {{"Nữ"}}
                            @endif
                        </td>
                        <td>{{$tt->hokhau}}</td>
                        <td>{{$tt->ghichu}}</td>
                        <td>{{$tt->malop->ten_lop}}</td>
                        <td>{{$tt->songaythamgiahd}}</td>
                        <td><a class="btn" href=""  data-toggle="modal" data-target="#editModel-{{$tt->mssv}}"><span class="fas fa-edit"></span> Sửa</a>
                            <a class="btn" href="admin/thongtindv/delete/{{$tt->mssv}}"><span class="fas fa-trash"></span> Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection