@foreach($quydoan as $qd)
<div id="editModel-{{$qd->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin quỷ đoàn</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/quydoan/edit/{{$qd->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên khoản tiền</label>
                        <input class="form-control" name="txtKhoantien" value="{{$qd->ten_khoan_tien}}" />
                    </div>
                    <div class="form-group">
                        <label>Tiền thu</label>
                        <input class="form-control" name="txtTienthu" value="{{$qd->tien_thu}}" />
                    </div>
                    <div class="form-group">
                        <label>Tiền chi</label>
                        <input class="form-control" name="txtTienchi" value="{{$qd->tien_chi}}" />
                    </div>
                    <div class="form-group">
                        <label>Năm</label>
                        <input class="form-control" name="txtNam" value="{{$qd->nam}}"/>
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <select class="form-control" name="MaLop" id="MaLop">
                            @foreach($malop as $ml)
                                <option
                                        @if($ml->id == $qd->id_lop)
                                            {{"selected"}}
                                        @endif
                                        value="{{$ml->id}}">{{$ml->ten_lop}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Người thu</label>
                        <input class="form-control" name="txtNguoithu" value="{{$qd->nguoi_thu}}" />
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