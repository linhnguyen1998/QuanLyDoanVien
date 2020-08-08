@extends('admin.layout.index')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">THỐNG KÊ</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Lớp</th>
                            <th>Số lượng sinh viên</th>
                            <th>Thông kê số lượng sổ đoàn</th>
                            <th>Thông kê số lượng sổ đoàn</th>
                            <th>Tổng tiền đoàn</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
{{--                                @foreach($dem as $d)--}}
{{--                                <td>{{$d->demsv}}</td>--}}
{{--                                @endforeach--}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection