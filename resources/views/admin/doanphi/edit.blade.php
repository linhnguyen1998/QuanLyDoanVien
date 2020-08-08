@foreach($doanphi as $dp)
<div id="edit-doanphi-Model-{{$dp->mssv}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin đoàn phí</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/doanphi/edit/{{$dp->mssv}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>MSSV</label>
                        <input class="form-control" name="txtMssv" readonly value="{{$dp->mssv}}" />
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="txtTieude" value="{{$dp->tieude}}" />
                    </div>
                    <div class="form-group">
                        <label>Ngày thu</label>
                        <input type="date" class="form-control" name="dtNgaythu" value="{{$dp->ngaythu}}"/>
                    </div>
                    <div class="form-group">
                        <label>Hết hạn thu</label>
                        <input type="date" class="form-control" name="dtHetthu" value="{{$dp->ngayketthuc}}"/>
                    </div>
                    <div class="form-group">
                        <label>Số tiền</label>
                        <input type="number" class="form-control" name="nmSotien" value="{{$dp->sotien}}"/>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái rút sổ đoàn</label>
                        <br>
                        <input type="radio"
                               @if($dp->trangthai == 0)
                                       {{"Checked"}}
                               @endif
                               value="0" name="rdoTrangthai"/> Chưa thu
                        <br>
                        <input type="radio"
                               @if($dp->trangthai == 1)
                               {{"Checked"}}
                               @endif
                               value="1" name="rdoTrangthai"/> Đã thu
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