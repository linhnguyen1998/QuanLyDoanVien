@extends('admin.layout.index')

@section('content')

    <div class="container">

{{--        THÊM VÀ SỬA SỔ ĐOÀN--}}
        @include('admin.sodoan.add')
        @include('admin.sodoan.edit')

{{--        THÊM VÀ SỬA ĐOÀN PHÍ--}}
        @include('admin.doanphi.add')
        @include('admin.doanphi.edit')

{{--        THÊM VÀ SỬA ĐIỂM RÈN LUYỆN--}}
        @include('admin.diemren.add')
        @include('admin.diemren.edit')

{{--        THÊM VÀ SỬA THÔNG TIN CÁ NHÂN ĐOÀN VIÊN--}}
        @include('admin.malop.addDoanVien')
        @include('admin.malop.editDoanVien')
    </div>

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">LỚP {{$malop->ten_lop}}</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-DoanVien-Model-{{$malop->id}}">
                    <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm
                </button>
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
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>MSSV</th>
                            <th>Họ tên</th>
                            <th>Đoàn phí</th>
                            <th>Sổ đoàn</th>
                            <th width="15%">Số ngày tham gia hoạt động</th>
                            <th>Điểm rèn luyện</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($thongtin as $tt)
                            <tr>
                                <td>{{$tt->mssv}}</td>
                                <td>{{$tt->hoten}}</td>
                                <td>
                                    @foreach($doanphi as $dp)
                                        @if($dp->mssv == $tt->mssv)
                                            @if($dp->trangthai == 1)
                                                {{"Đã đóng"}}
                                            @elseif($dp->trangthai == 0)
                                                {{"Chưa đóng"}}
                                            @endif
                                        @endif
                                    @endforeach
                                    <br>
                                        <a class="btn" href="" data-toggle="modal" data-target="#add-doanphi-Model-{{$tt->mssv}}"><span class="fa fa-plus"></span></a>|
                                        <a class="btn" href="" data-toggle="modal" data-target="#edit-doanphi-Model-{{$tt->mssv}}"><span class="fa fa-edit"></span></a>
                                </td>
                                <td>
                                    @foreach($sodoan as $sd)
                                        @if($sd->mssv == $tt->mssv)
                                            @if($sd->trangthairutsodoan == 1)
                                                {{"Đã rút"}}
                                            @elseif($sd->trangthairutsodoan == 0)
                                                {{"Chưa rút"}}
                                            @endif
                                        @endif
                                    @endforeach
                                    <br>
                                    <a class="btn" href="" data-toggle="modal" data-target="#add-sodoan-Model-{{$tt->mssv}}"><span class="fa fa-plus"></span></a>|
                                    <a class="btn" href="" data-toggle="modal" data-target="#edit-sodoan-Model-{{$tt->mssv}}"><span class="fa fa-edit"></span></a>
                                </td>
                                <td>{{$tt->songaythamgiahd}} ngày</td>
                                <td>
                                    @foreach($diemren as $dr)
                                        @if($dr->mssv == $tt->mssv)
                                            {{$dr->diem_lop}}
                                        @endif
                                    @endforeach
                                        <br>
                                        <a class="btn" href="" data-toggle="modal" data-target="#add-diemren-Model-{{$tt->mssv}}"><span class="fa fa-plus"></span></a>|
                                        <a class="btn" href="" data-toggle="modal" data-target="#edit-diemren-Model-{{$tt->mssv}}"><span class="fa fa-edit"></span></a>
                                </td>
                                <td>
                                    <a class="btn" href=""  data-toggle="modal" data-target="#edit-DoanVien-Model-{{$tt->mssv}}"><span class="fas fa-edit"></span> Sửa</a>
                                    <a class="btn" href="admin/malop/delete/DV/{{$tt->mssv}}"><span class="fas fa-trash"></span> Xóa</a>
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