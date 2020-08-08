@foreach($user as $us)
<div id="editModel-{{$us->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật {{$us->ten_admin}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/thanhvien/edit/{{$us->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="txtHoten" value="{{$us->ten_admin}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail" disabled="" value="{{$us->email}}" />
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
                                   @if($us->quyen == 1)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="rdoQuyen" value="0"
                                   @if($us->quyen == 0)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Normal
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>
    @endforeach