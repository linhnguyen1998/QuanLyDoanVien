@extends('admin.layout.index')

@section('content')

<div class="container">
    @include('admin.diemren.add')
    @include('admin.diemren.edit')
</div>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ ĐIỂM RÈN LUYỆN</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModel">
                <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm
            </button>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>MSSV</th>
                        <th>Điểm</th>
                        <th>Ghí chú</th>
                        <th>Hoạt động</th>
                        <th>Thành tích</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($diemren as $dr)
                    <tr>
                        <td>{{$dr->mssv}}</td>
                        <td>{{$dr->diem_lop}}</td>
                        <td>{{$dr->ghi_chu}}</td>
                        <td>{{$dr->hoatdong}}</td>
                        <td>{{$dr->thanhtich}}</td>
                        <td><a class="btn" href=""  data-toggle="modal" data-target="#editModel-{{$dr->mssv}}"><span class="fas fa-edit"></span> Sửa</a>
                            <a class="btn" href="admin/diemren/delete/{{$dr->mssv}}"><span class="fas fa-trash"></span> Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $('#ttdv').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                var query = $(this).val(); //lấy gía trị ng dùng gõ
                if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                {
                    var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                    $.ajax({
                        url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                        method:"POST", // phương thức gửi dữ liệu.
                        data:{query:query, _token:_token},
                        success:function(data){ //dữ liệu nhận về
                            $('#ttdvList').fadeIn();
                            $('#ttdvList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                        }
                    });
                }
            });

            $(document).on('click', 'td', function(){
                $('#ttdv').val($(this).text());
                $('#ttdvList').fadeOut();
            });

        });
    </script>
@endsection