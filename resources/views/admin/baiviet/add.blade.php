@extends('admin.layout.index')

@section('content')
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">THÊM BÀI VIẾT</h1>
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
            <div class="row">
                <div class="col-sm-12">
                <form action="admin/baiviet/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="txtTieude" placeholder="Điền tên tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control ckeditor" rows="10" cols="150" name="txtNoidung"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="txtHinh"/>
                    </div>
                    <div class="form-group">
                        <label>Danh mục bài viết</label>
                        <select class="form-control" name="DanhMuc" id="DanhMuc">
                            <option>Vui lòng chọn tên danh mục</option>
                            @foreach($danhmuc as $dm)
                                <option value="{{$dm->id}}">{{$dm->tendm}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-info">Làm mới</button>
                </form>
                </div>
            </div>
        </div>
@endsection