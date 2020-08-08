@foreach($thongtin as $tt)
    <div id="edit-DoanVien-Model-{{$tt->mssv}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa thông tin đoàn viên<br>MSSV: {{$tt->mssv}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/malop/edit/DV/{{$tt->mssv}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input class="form-control" name="txtHoten" value="{{$tt->hoten}}" />
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" name="dtNgaysinh" class="form-control" value="{{$tt->ngaysinh}}" />
                        </div>
                        <div class="form-group">
                            <label>Phái</label>
                            <br>
                            <label class="radio-inline">
                                <input name="rdoPhai" type="radio"
                                       @if($tt->phai == 0)
                                       {{"checked"}}
                                       @endif
                                       value="0">Nam
                            </label>
                            <label class="radio-inline">
                                <input name="rdoPhai" type="radio"
                                       @if($tt->phai == 1)
                                       {{"checked"}}
                                       @endif
                                       value="1">Nữ
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Hộ khẩu</label>
                            <input class="form-control" name="txtHokhau" value="{{$tt->hokhau}}" />
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <input class="form-control" name="txtGhichu" value="{{$tt->ghichu}}"/>
                        </div>
                        <div class="form-group">
                            <label>Đoàn phí đến ngày</label>
                            <input type="date" class="form-control" name="dtNgaydongdp" value="{{$tt->dp_denngay}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tên lớp</label>
                            <select class="form-control" name="MaLop" id="MaLop">
                                    <option value="{{$malop->id}}">{{$malop->ten_lop}}
                                    </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Số ngày tham gia hoạt động</label>
                            <input type="number" class="form-control" value="{{$tt->songaythamgiahd}}" name="nm_Songay"/>
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