@extends('admin.layout.index')

@section('content')

<div class="container">
    @include('admin.malop.add')
    @include('admin.malop.edit')
</div>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ LỚP</h1>
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
                        <th>Mã lớp</th>
                        <th>Tên lớp</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($malop as $ml)
                    <tr>
                        <td>{{$ml->mslop}}</td>
                        <td>{{$ml->ten_lop}} <a style="float: right" href="admin/malop/list/{{$ml->id}}"><i class="fas fa-eye"> Xem chi tiết</i></a></td>
                        <td><a class="btn" href=""  data-toggle="modal" data-target="#editModel-{{$ml->id}}"><span class="fas fa-edit"></span> Sửa</a>
                            <a class="btn" href="admin/malop/delete/{{$ml->id}}"><span class="fas fa-trash"></span> Xóa</a>
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