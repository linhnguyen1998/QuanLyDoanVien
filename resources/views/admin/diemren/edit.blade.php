@foreach($diemren as $dr)
<div id="edit-diemren-Model-{{$dr->mssv}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin điểm rèn luyện</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/diemren/edit/{{$dr->mssv}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Điểm</label>
                        <input class="form-control" name="txtMssv" readonly value="{{$dr->mssv}}" />
                    </div>
                    <div class="form-group">
                        <label>Điểm</label>
                        <input class="form-control" name="txtDiem" value="{{$dr->diem_lop}}" />
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <input class="form-control" name="txtGhichu" value="{{$dr->ghi_chu}}" />
                    </div>
                    <div class="form-group">
                        <label>Hoạt động</label>
                        <input class="form-control" name="txtHoatdong" value="{{$dr->hoatdong}}" />
                    </div>
                    <div class="form-group">
                        <label>Thành tích</label>
                        <input class="form-control" name="txtThanhtich" value="{{$dr->thanhtich}}" />
                    </div>
                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-info">Làm mới</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>
    @endforeach