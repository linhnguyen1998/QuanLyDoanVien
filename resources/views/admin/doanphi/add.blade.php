@foreach($thongtin as $tt)
<div id="add-doanphi-Model-{{$tt->mssv}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm Đoàn Phí</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/doanphi/add" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>MSSV</label>
                        <input type="text" name="ttdv" id="ttdv" class="form-control input-lg" readonly value="{{$tt->mssv}}" />
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="txtTieude" placeholder="Điền tên tiêu đề..." />
                    </div>
                    <div class="form-group">
                        <label>Ngày thu</label>
                        <input type="date" class="form-control" name="dtNgaythu"/>
                    </div>
                    <div class="form-group">
                        <label>Hết hạn thu</label>
                        <input type="date" class="form-control" name="dtHetthu"/>
                    </div>
                    <div class="form-group">
                        <label>Số tiền</label>
                        <input type="number" class="form-control" name="nmSotien"/>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái thu</label>
                        <br>
                        <input type="radio" value="0" name="rdoTrangthai"/> Chưa thu
                        <br>
                        <input type="radio" value="1" name="rdoTrangthai"/> Đã thu
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