@foreach($danhmuc as $dm)
<div id="editModel-{{$dm->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật {{$dm->tendm}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/danhmuc/edit/{{$dm->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên danh mục</label>

                        <input class="form-control" name="txtTendm" value="{{$dm->tendm}}"/>
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