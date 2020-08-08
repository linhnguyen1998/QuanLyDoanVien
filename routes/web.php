<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TrangChuController@getThongbao');
Route::get('/tracuu', 'TrangChuController@getTracuu');
Route::post('/tracuu/ketqua', 'TrangChuController@getKetQua');
Route::post('/tracuu/ketqua/xuat', 'TrangChuController@getXuatKetQua');


Route::get('admin/login', 'UserController@getLoginAdmin');
Route::post('admin/login', 'UserController@postLoginAdmin');
Route::get('admin/logout', 'UserController@getLogoutAdmin');



Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function (){

    //Danh mục bài viết
    Route::group(['prefix'=>'danhmuc'], function (){
       Route::get('/list', 'DanhMucBaiVietController@getList');

       Route::post('/add', 'DanhMucBaiVietController@postAdd');

        Route::post('/edit/{id}', 'DanhMucBaiVietController@postEdit');

        Route::get('/delete/{id}', 'DanhMucBaiVietController@getDel');
    });

    //Bài viết
    Route::group(['prefix'=>'baiviet'], function (){
        Route::get('/list', 'BaiVietController@getList');

        Route::get('/add', 'BaiVietController@getAdd');

        Route::post('/add', 'BaiVietController@postAdd');

        Route::get('/edit/{id}', 'BaiVietController@getEdit');

        Route::post('/edit/{id}', 'BaiVietController@postEdit');

        Route::get('/delete/{id}', 'BaiVietController@getDel');
    });

    //Sổ đoàn
    Route::group(['prefix'=>'sodoan'], function (){
        Route::get('/list', 'SoDoanController@getList');

        Route::post('/add', 'SoDoanController@postAdd');

        Route::post('/edit/{id}', 'SoDoanController@postEdit');

        Route::get('/delete/{id}', 'SoDoanController@getDel');

        Route::post('search/name', 'SoDoanController@getSearchAjax')->name('search');
    });


    //Mã lớp
    Route::group(['prefix'=>'malop'], function (){
        Route::get('/list', 'MaLopController@getList');

        Route::get('/list/{id}', 'MaLopController@getLop');

        Route::post('/add', 'MaLopController@postAdd');

        Route::post('/edit/{id}', 'MaLopController@postEdit');

        Route::get('/delete/{id}', 'MaLopController@getDel');

        Route::post('/add/DV', 'MaLopController@postAddDV');

        Route::post('/edit/DV/{id}', 'MaLopController@postEditDV');

        Route::get('/delete/DV/{id}', 'MaLopController@getDelDV');

        Route::get('/thongke', 'MaLopController@thongke');
    });

    //Thông tin đoàn viên
    Route::group(['prefix'=>'thongtindv'], function (){
        Route::get('/list', 'ThongTinDoanVienController@getList');

        Route::post('/add', 'ThongTinDoanVienController@postAdd');

        Route::post('/edit/{id}', 'ThongTinDoanVienController@postEdit');

        Route::get('/delete/{id}', 'ThongTinDoanVienController@getDel');

        Route::get('/downloadExcel/{type}', 'ExelController@downloadExel');
        Route::post('/importExcel', 'ExelController@importExcel');
    });

    ///Đoàn phí
    Route::group(['prefix'=>'doanphi'], function (){
        Route::get('/list', 'DoanPhiController@getList');

        Route::post('/add', 'DoanPhiController@postAdd');

        Route::post('/edit/{id}', 'DoanPhiController@postEdit');

        Route::get('/delete/{id}', 'DoanPhiController@getDel');

        Route::post('search/name', 'DoanPhiController@getSearchAjax')->name('search');
    });

    //Điểm rèn
    Route::group(['prefix'=>'diemren'], function (){
        Route::get('/list', 'DiemRenController@getList');

        Route::post('/add', 'DiemRenController@postAdd');

        Route::post('/edit/{id}', 'DiemRenController@postEdit');

        Route::get('/delete/{id}', 'DiemRenController@getDel');

        Route::post('search/name', 'DiemRenController@getSearchAjax')->name('search');
    });

    //Quỷ đoàn
    Route::group(['prefix'=>'quydoan'], function (){
        Route::get('/list', 'QuyDoanController@getList');

        Route::post('/add', 'QuyDoanController@postAdd');

        Route::post('/edit/{id}', 'QuyDoanController@postEdit');

        Route::get('/delete/{id}', 'QuyDoanController@getDel');

    });

    //Thành viên
    Route::group(['prefix'=>'thanhvien'], function (){
        Route::get('/list', 'UserController@getList');

        Route::post('/add', 'UserController@postAdd');

        Route::get('/edit/{id}', 'UserController@getEdit');

        Route::post('/edit/{id}', 'UserController@postEdit');

        Route::get('/delete/{id}', 'UserController@getDel');

    });
});


