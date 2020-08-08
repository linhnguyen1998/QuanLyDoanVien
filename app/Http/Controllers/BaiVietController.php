<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaiViet;
use App\DanhMucBaiViet;

class BaiVietController extends Controller
{
    public function getList()
    {
        $baiviet = BaiViet::orderBy('id','DESC')->get();
        return view('admin.baiviet.list',['baiviet'=>$baiviet]);
    }

    public function getAdd()
    {
        $danhmuc = DanhMucBaiViet::all();
        return view('admin.baiviet.add',['danhmuc'=>$danhmuc]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'DanhMuc'=>'required',
                'txtTieude'=>'required|min:3|unique:baiviet,tieu_de',
                'txtNoidung'=>'required',
                'txtHinh'=>'required|image|mimes:jpg,jpeg,png',
            ],
            [
                'DanhMuc.required'=>'Bạn chưa chọn danh mục',
                'txtTieude.required'=>'Bạn chưa nhập tiêu đề',
                'txtTieude.min'=>'Tiêu đề không được bé hơn 3 kí tự',
                'txtTieude.unique'=>'Tiêu đề đã tồn tại',
                'txtNoidung.required'=>'Bạn chưa nhập nội dung',
                'txtHinh.required'=>'Bạn chưa thêm hình ảnh',
                'txtHinh.image'=>'Đây không phải là file hình ảnh',
                'txtHinh.mimes'=>'Hình ảnh phải có đuôi là jpg,jpeg,png',
            ]);
        $baiviet = new BaiViet;
        $baiviet->tieu_de= $request->txtTieude;
        $baiviet->id_dm = $request->DanhMuc;
        $baiviet->noi_dung = $request->txtNoidung;
        $baiviet->luotxem = 0;
        if($request->hasFile('txtHinh'))
        {
            $file = $request->file('txtHinh');
            $name = $file->getClientOriginalName();
            $file->move("upload/baiviet/",$name);
            $baiviet->hinh_anh = $name;
        }
        else
        {
            $baiviet->hinh_anh = "";
        }
        $baiviet->save();
        return redirect("admin/baiviet/add")->with('thongbao','Thêm tin tức thành công');
    }

    public function getEdit($id)
    {
        $danhmuc = DanhMucBaiViet::all();
        $baiviet = BaiViet::find($id);
        return view('admin.baiviet.edit',['danhmuc'=>$danhmuc, 'baiviet'=>$baiviet]);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                'DanhMuc'=>'required',
                'txtNoidung'=>'required',
                'txtHinh'=>'image|mimes:jpg,jpeg,png',
            ],
            [
                'DanhMuc.required'=>'Bạn chưa chọn danh mục',
                'txtNoidung.required'=>'Bạn chưa nhập nội dung',
                'txtHinh.image'=>'Đây không phải là file hình ảnh',
                'txtHinh.mimes'=>'Hình ảnh phải có đuôi là jpg,jpeg,png',
            ]);
        $baiviet = BaiViet::find($id);
        $baiviet->id_dm = $request->DanhMuc;
        $baiviet->noi_dung = $request->txtNoidung;
        if($request->hasFile('txtHinh'))
        {
            $file = $request->file('txtHinh');
            $name = $file->getClientOriginalName();
            unlink("upload/baiviet/".$baiviet->hinh_anh);
            $file->move("upload/baiviet/",$name);
            $baiviet->hinh_anh = $name;
        }
        $baiviet->save();
        return redirect("admin/baiviet/edit/".$id)->with('thongbao','Cập nhật thành công');
    }

    public function getDel($id)
    {
        $baiviet = BaiViet::find($id);
        unlink("upload/baiviet/".$baiviet->hinh_anh);
        $baiviet->delete();
        return redirect('admin/baiviet/list')->with('thongbao','Xóa dữ liệu thành công');
    }
}
