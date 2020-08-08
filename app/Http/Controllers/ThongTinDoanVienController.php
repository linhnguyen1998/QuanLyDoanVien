<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongTinDoanVien;
use App\MaLop;


class ThongTinDoanVienController extends Controller
{
    public function getList()
    {
        $malop = MaLop::all();
        $ttdv = ThongTinDoanVien::all();
        return view('admin.thongtindoanvien.list', ['ttdv'=>$ttdv, 'malop'=>$malop]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtMssv'=>'required|unique:thongtindoanvien,mssv',
            'txtHoten'=>'required|min:3',
            'dtNgaysinh'=>'required',
            'MaLop'=>'required',
        ],
            [
                'txtMssv.required'=>'Mã số sinh viên không được để trống',
                'txtMssv.unique'=>'MSSV đã tồn tại',
                'txtHoten.required'=>'Họ tên không được để trống',
                'txtHoten.min'=>'Họ tên phải có ít nhất 3 kí tự',
                'dtNgaysinh.required'=>'Vui lòng chọn ngày sinh',
                'Malop.required'=>'Vui lòng chọn mã lớp',
            ]);
        $ttdv = new ThongTinDoanVien;
        $ttdv->mssv = $request->txtMssv;
        $ttdv->hoten = $request->txtHoten;
        $ttdv->ngaysinh = $request->dtNgaysinh;
        $ttdv->phai = $request->rdoPhai;
        $ttdv->hokhau = $request->txtHokhau;
        $ttdv->ghichu = $request->txtGhichu;
        $ttdv->dp_denngay = $request->dtNgaydongdp;
        $ttdv->id_lop = $request->MaLop;
        $ttdv->songaythamgiahd = $request->nm_Songay;
        $ttdv->save();
        return redirect('admin/thongtindv/list')->with('thongbao', 'Thêm thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtHoten'=>'required|min:3',
            'dtNgaysinh'=>'required',
            'MaLop'=>'required',
        ],
            [
                'txtHoten.required'=>'Họ tên không được để trống',
                'txtHoten.min'=>'Họ tên phải có ít nhất 3 kí tự',
                'dtNgaysinh.required'=>'Vui lòng chọn ngày sinh',
                'Malop.required'=>'Vui lòng chọn mã lớp',
            ]);
        $ttdv = ThongTinDoanVien::find($id);
        $ttdv->hoten = $request->txtHoten;
        $ttdv->ngaysinh = $request->dtNgaysinh;
        $ttdv->phai = $request->rdoPhai;
        $ttdv->hokhau = $request->txtHokhau;
        $ttdv->ghichu = $request->txtGhichu;
        $ttdv->dp_denngay = $request->dtNgaydongdp;
        $ttdv->id_lop = $request->MaLop;
        $ttdv->songaythamgiahd = $request->nm_Songay;
        $ttdv->save();
        return redirect('admin/thongtindv/list')->with('thongbao', 'Cập nhật thành công');
    }

    public function getDel($id)
    {
        $ttdv = ThongTinDoanVien::find($id);
        $ttdv->delete();
        return redirect('admin/thongtindv/list')->with('thongbao', 'Xóa dữ liệu thành công');
    }

}
