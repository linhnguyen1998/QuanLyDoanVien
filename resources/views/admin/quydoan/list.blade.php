@extends('admin.layout.index')

@section('content')

<div class="container">
    @include('admin.quydoan.add')
    @include('admin.quydoan.edit')
</div>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ THÔNG TIN QUỶ ĐOÀN</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModel">
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khoản tiền</th>
                        <th>Tiền thu</th>
                        <th>Tiền chi</th>
                        <th>Năm</th>
                        <th>Tên lớp</th>
                        <th>Người thu</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quydoan as $qd)
                    <tr>
                        <td>{{$qd->id}}</td>
                        <td>{{$qd->ten_khoan_tien}}</td>
                        <td>{{$qd->tien_thu}}</td>
                        <td>{{$qd->tien_chi}}</td>
                        <td>{{$qd->nam}}</td>
                        <td>{{$qd->malop->ten_lop}}</td>
                        <td>{{$qd->nguoi_thu}}</td>
                        <td><a class="btn" href=""  data-toggle="modal" data-target="#editModel-{{$qd->id}}"><span class="fas fa-edit"></span> Sửa</a>
                            <a class="btn" href="admin/quydoan/delete/{{$qd->id}}"><span class="fas fa-trash"></span> Xóa</a>
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