<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucBaiViet;
use Illuminate\Support\Facades\DB;

class DanhMucBaiVietController extends Controller
{
    public function getList()
    {
        $danhmuc = DanhMucBaiViet::all();
        return view('admin.dmbaiviet.list', ['danhmuc'=>$danhmuc]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request, [
                'txtTendm'=>'required|min:3|unique:dmbaiviet,tendm'
            ],
            [
                'txtTendm.required'=>'Tên danh mục không được để trống',
                'txtTendm.unique'=>'Tên danh mục đã tồn tại',
                'txtTendm.min'=>'Tên danh mục phải nhiều hơn 3 kí tự'
            ]);
        $danhmuc = new DanhMucBaiViet;
        $danhmuc->tendm = $request->txtTendm;
        $danhmuc->save();
        return redirect('admin/danhmuc/list')->with('thongbao', 'Thêm thành công');
    }
    public function postEdit(Request $request, $id)
    {
//        $danhmuc = DB::table('dmbaiviet')->where('id_dm', $id)->get();
        $this->validate($request, [
            'txtTendm'=>'required|min:3|unique:dmbaiviet,tendm'
        ],
            [
                'txtTendm.required'=>'Tên danh mục không được để trống',
                'txtTendm.unique'=>'Tên danh mục đã tồn tại',
                'txtTendm.min'=>'Tên danh mục phải nhiều hơn 3 kí tự'
            ]);
        DB::table('dmbaiviet')->where('id', $id)->update(['tendm'=>$request->txtTendm]);
        return redirect('admin/danhmuc/list')->with('thongbao', 'Cập nhật thành công');
    }

    public function getDel($id)
    {
        DB::table('dmbaiviet')->where('id', $id)->delete();
        return redirect('admin/danhmuc/list')->with('thongbao', 'Xóa dữ liệu thành công');
    }

}
