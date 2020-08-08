<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ĐOÀN VIÊN KHOA CNTT</title>
    <!-- Custom fonts for this template -->
    <base href="{{asset('')}}">
    <link rel="icon" href="admin_asset/12.png" type="image/png">
    <link href="admin_asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="admin_asset/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="admin_asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    @include('trangchu.layout.menu')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->


                <!-- Topbar căn chỉnh sang phải -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::check())
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->ten_admin}}</span>
                            @endif
                            <img class="img-profile rounded-circle" src="http://hn-ams.edu.vn/sites/default/files/u8871/doan.jpg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            @if(Auth::check())
                            <button class="dropdown-item" >
                                <i class="fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{Auth::user()->ten_admin}}
                            </button>
                            <a class="dropdown-item" href="admin/thanhvien/edit/{{Auth::user()->id}}">
                                <i class="fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cài đặt
                            </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            @if(Auth::check())
                            <a class="dropdown-item" href="admin/logout" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng Xuất
                            </a>
                            @else
                                    <a class="dropdown-item" href="admin/login">
                                        <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Đăng Nhập
                                    </a>
                            @endif
                        </div>
                    </li>
                </ul>

            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            @yield('content')
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019 by CNTT2016</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn đăng suất</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Đăng xuất" nếu bạn muốn đăng nhập</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" href="admin/logout">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="admin_asset/vendor/jquery/jquery.min.js"></script>
<script src="admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="admin_asset/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="admin_asset/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="admin_asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="admin_asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="admin_asset/js/demo/datatables-demo.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

@yield('script')

</body>

</html>
