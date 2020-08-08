@foreach($thongtin as $tt)
<div id="add-sodoan-Model-{{$tt->mssv}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm Sổ Đoàn</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/sodoan/add" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>MSSV</label>
                        <input type="text" name="ttdv" id="ttdv" class="form-control input-lg" readonly value="{{$tt->mssv}}"/>
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input class="form-control" name="txtDonvi" placeholder="Điền tên đơn vị..." />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái rút sổ đoàn</label>
                        <br>
                        <input type="radio" value="0" name="rdoTrangthai"/> Chưa rút
                        <br>
                        <input type="radio" value="1" name="rdoTrangthai"/> Đã rút
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <input class="form-control" name="txtGhichu" placeholder="Ghi chú..." />
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