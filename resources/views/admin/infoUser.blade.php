@extends('admin.layout.index')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form action="admin/thanhvien/edit/{{$user->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="txtHoten" value="{{$user->ten_admin}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail" disabled="" value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <input id="checkPassword" type="checkbox" name="changePassword">
                        <label>Đổi mật khẩu</label>
                        <input type="password" class="form-control password" name="txtPass" disabled="" placeholder="Mật khẩu mới"/>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control password" name="txtPassAgain" disabled="" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Quyền người dùng </label>
                        <label class="radio-inline">
                            <input name="rdoQuyen" value="1"
                                   @if($user->quyen == 1)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="rdoQuyen" value="0"
                                   @if($user->quyen == 0)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Normal
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

    @endsection
