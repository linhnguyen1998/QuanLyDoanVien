<div id="addModel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm danh thành viên</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/thanhvien/add" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="txtHoten" placeholder="Hãy điền họ và tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail" placeholder="Hãy điền email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtPass" placeholder="Hãy điền Mật khẩu..." />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="txtPassAgain" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Quyền người dùng </label>
                        <label class="radio-inline">
                            <input name="rdoQuyen" value="1" checked="" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="rdoQuyen" value="0" type="radio">Normal
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-info">Làm mới</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
