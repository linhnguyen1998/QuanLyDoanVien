@foreach($malop as $ml)
<div id="editModel-{{$ml->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin lớp</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/malop/edit/{{$ml->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Mã số lớp</label>

                        <input class="form-control" disabled name="txtMalop" value="{{$ml->mslop}}"/>
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>

                        <input class="form-control" name="txtTenlop" value="{{$ml->ten_lop}}"/>
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