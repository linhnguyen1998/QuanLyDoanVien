@extends('admin.layout.index')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ BÀI VIẾT</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <a href="admin/baiviet/add" style="margin: 20px" class="btn btn-primary">
                <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm
            </a>
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
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                        <th>Tên danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Lượt xem</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($baiviet as $bv)
                    <tr>
                        <td>{{$bv->id}}</td>
                        <td>{{$bv->tieu_de}}</td>
                        <td>{!!$bv->noi_dung!!}</td>
                        <td><img style="width: 20%" src="upload/baiviet/{{$bv->hinh_anh}}"></td>
                        <td>{{$bv->danhmucbaiviet->tendm}}</td>
                        <td>{{$bv->created_at}}</td>
                        <td>{{$bv->updated_at}}</td>
                        <td>{{$bv->luotxem}}</td>
                        <td><a class="btn" href="admin/baiviet/edit/{{$bv->id}}"><span class="fas fa-edit"></span> Sửa</a>
                            <a class="btn" href="admin/baiviet/delete/{{$bv->id}}"><span class="fas fa-trash"></span> Xóa</a>
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