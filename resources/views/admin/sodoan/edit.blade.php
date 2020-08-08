@foreach($sodoan as $sd)
<div id="edit-sodoan-Model-{{$sd->mssv}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin sổ đoàn</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/sodoan/edit/{{$sd->mssv}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>MSSV</label>
                        <input class="form-control" disabled name="txtMssv" value="{{$sd->mssv}}" />
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input class="form-control" name="txtDonvi" value="{{$sd->donvi}}" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái rút sổ đoàn</label>
                        <br>
                        <input type="radio"
                               @if($sd->trangthairutsodoan == 0)
                                       {{"Checked"}}
                               @endif
                               value="0" name="rdoTrangthai"/> Chưa rút
                        <br>
                        <input type="radio"
                               @if($sd->trangthairutsodoan == 1)
                               {{"Checked"}}
                               @endif
                               value="1" name="rdoTrangthai"/> Đã rút
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <input class="form-control" name="txtGhichu" value="{{$sd->ghichu}}"/>
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