@foreach($thongtin as $tt)
<div id="add-diemren-Model-{{$tt->mssv}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm Điểm Rèn Luyện</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/diemren/add" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>MSSV</label>
                        <input type="text" name="ttdv" id="ttdv" class="form-control input-lg" readonly value="{{$tt->mssv}}" />
                    </div>
                    <div class="form-group">
                        <label>Điểm</label>
                        <input class="form-control" name="txtDiem" placeholder="Vui lòng nhập điểm..." />
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <input class="form-control" name="txtGhichu" placeholder="Ghi chú..." />
                    </div>
                    <div class="form-group">
                        <label>Hoạt động</label>
                        <input class="form-control" name="txtHoatdong" placeholder="Hoạt động..." />
                    </div>
                    <div class="form-group">
                        <label>Thành tích</label>
                        <input class="form-control" name="txtThanhtich" placeholder="Thành tích..." />
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
@endforeach