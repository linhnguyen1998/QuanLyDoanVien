<div id="addModel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm danh mục bài viết</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/danhmuc/add" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên danh mục bài viết</label>
                        <input class="form-control" name="txtTendm" placeholder="Điền tên danh mục bài viết" />
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
