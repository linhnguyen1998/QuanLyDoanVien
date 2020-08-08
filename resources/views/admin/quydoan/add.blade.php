<div id="addModel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm thông tin quỷ đoàn</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/quydoan/add" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên khoản tiền</label>
                        <input class="form-control" name="txtKhoantien" placeholder="Điền khoản tiền..." />
                    </div>
                    <div class="form-group">
                        <label>Tiền thu</label>
                        <input class="form-control" name="txtTienthu" placeholder="Tiền thu..." />
                    </div>
                    <div class="form-group">
                        <label>Tiền chi</label>
                        <input class="form-control" name="txtTienchi" placeholder="Tiền chi..." />
                    </div>
                    <div class="form-group">
                        <label>Năm</label>
                        <input class="form-control" name="txtNam" placeholder="Điền năm thu tiền..."/>
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
                        <label>Người thu</label>
                        <input class="form-control" name="txtNguoithu" placeholder="Vui lòng nhập người thu..." />
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
