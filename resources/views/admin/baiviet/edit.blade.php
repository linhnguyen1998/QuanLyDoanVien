@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">CẬP NHẬT BÀI VIẾT<br>{{$baiviet->tieu_de}}</h1>
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
                <form action="admin/baiviet/edit/{{$baiviet->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control ckeditor" rows="10" cols="150" name="txtNoidung">{{$baiviet->noi_dung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <br>
                        <img class="img-responsive" width="200px" src="upload/baiviet/{{$baiviet->hinh_anh}}">
                        <input type="file" class="form-control" name="txtHinh"/>
                    </div>
                    <div class="form-group">
                        <label>Danh mục bài viết</label>
                        <select class="form-control" name="DanhMuc" id="DanhMuc">
                            @foreach($danhmuc as $dm)
                                <option
                                        @if($dm->id == $baiviet->danhmucbaiviet->id)
                                            {{"selected"}}
                                        @endif
                                        value="{{$dm->id}}">{{$dm->tendm}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </form>
            </div>
        </div>

    </div>
@endsection