<div id="addModel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm thông tin đoàn viên</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/thongtindv/add" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>MSSV</label>
                        <input class="form-control" name="txtMssv" placeholder="Điền MSSV..." />
                    </div>
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="txtHoten" placeholder="Điền họ tên" />
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="dtNgaysinh" />
                    </div>
                    <div class="form-group">
                        <label>Phái</label>
                        <br>
                        <label class="radio-inline">
                            <input name="rdoPhai" value="0" checked="" type="radio">Nam
                        </label>
                        <label class="radio-inline">
                            <input name="rdoPhai" value="1" type="radio">Nữ
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Hộ khẩu</label>
                        <input class="form-control" name="txtHokhau" />
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <input class="form-control" name="txtGhichu" />
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <select class="form-control" name="MaLop" id="MaLop">
                            <option>Vui lòng chọn tên lớp</option>
                            @foreach($malop as $ml)
                                <option value="{{$ml->id}}">{{$ml->ten_lop}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Số ngày tham gia hoạt động</label>
                        <input type="number" class="form-control" value="0" name="nm_Songay"/>
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
