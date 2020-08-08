@extends('trangchu.layout.index')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
                <div class="form-group">
                    <label class="text-lg text-black">Tra cứu thông tin sinh viên</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="txtSearch" id="txtSearch" placeholder="MSSV, Họ tên,...">
                        <div class="input-group-append">
                            <button type="button" id="btn_send" class="btn btn-primary">Tra cứu</button>
                        </div>
                    </div>
                    <span data-spy="scroll" data-target=".list-group" data-offset="50" id="list"><br>
                    </span>
                    {{csrf_field()}}
                </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="text-lg text-black">.</label>
                <div class="input-group mb-3">
                    <div class="input-group">
                        <button id="click" class="btn btn-primary"><i class="fas fa-file-pdf"></i> In thông tin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12" id="table_data">
{{--            <div class="card text-white mb-3">--}}
{{--                <div class="card-header text-primary">--}}
{{--                    <img style="float: left; margin-right: 5px" src="admin_asset/12.png" width="50px" height="50px">--}}
{{--                    <span style="float: left;">TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VĨNH LONG--}}
{{--				  	</span>--}}
{{--                    <br>--}}
{{--                    <span class="text-sm" style="float: left;">www.vlute.edu.vn</span>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <table class="table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th colspan="4" class="text-center text-lg">THÔNG TIN ĐOÀN VIÊN</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th colspan="4" class="text-dark" style="background-color: #ecf6ff">THÔNG TIN CÁ NHÂN</th>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>MSSV</th>--}}
{{--                            <td>16004037</td>--}}
{{--                            <th>Giới tính</th>--}}
{{--                            <td>Nam</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Họ tên</th>--}}
{{--                            <td>Nguyễn Vân Khánh Linh</td>--}}
{{--                            <th>Ngày sinh</th>--}}
{{--                            <td>22-9-1998</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Lớp</th>--}}
{{--                            <td>ĐH. CNTT 2016</td>--}}
{{--                            <th>Số ngày tham gia hoạt động</th>--}}
{{--                            <td>11</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th colspan="4" class="text-dark" style="background-color: #ecf6ff">THÔNG TIN SỔ ĐOÀN</th>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Đơn vị</th>--}}
{{--                            <td>ĐH. CNTT 2016 <b class="badge badge-info">Đã rút sổ</b></td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th colspan="4" class="text-dark" style="background-color: #ecf6ff">THÔNG TIN ĐOÀN PHÍ</th>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Hết hạn đóng</th>--}}
{{--                            <td>12-12-2019</td>--}}
{{--                            <th>Số tiền cần đóng</th>--}}
{{--                            <td>11.000đ <b class="badge badge-info">Đã đóng</b></td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th colspan="4" class="text-dark" style="background-color: #ecf6ff">ĐIỂM RÈN LUYỆN ĐOÀN VIÊN</th>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Điểm</th>--}}
{{--                            <td>81</td>--}}
{{--                            <th>Thành tích</th>--}}
{{--                            <td>Không</td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        {{csrf_field()}}
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $("#txtSearch").keyup(function () {
                tukhoa = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.post("/tracuu/ketqua/",{tukhoa:tukhoa, _token:_token}, function (data) {
                    $('#list').fadeIn();
                    $("#list").html(data);
                });
            });

            $(document).on('click', 'li', function(){
                $('#txtSearch').val($(this).text());
                $('#list').fadeOut();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#btn_send").click(function () {
                tukhoa = $("#txtSearch").val();
                var _token = $('input[name="_token"]').val();
                $.post("/tracuu/ketqua/xuat/", {tukhoa:tukhoa, _token:_token}, function (data) {
                    $('#table_data').fadeIn();
                    $('#table_data').html(data);
                });
            });
            $("#txtSearch").keyup(function () {
                if ($("#txtSearch").val() == '') {
                    $('#table_data').fadeOut();
                }
            });
        });
    </script>
    @endsection