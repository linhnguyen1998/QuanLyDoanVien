<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaLop;
use App\ThongTinDoanVien;
use App\SoDoan;
use App\DoanPhi;
use App\DiemRen;
use DB;

class MaLopController extends Controller
{
    public function getList()
    {
        $malop = MaLop::all();
        return view('admin.malop.list', ['malop'=>$malop]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtMalop'=>'required|unique:malop,mslop',
            'txtTenlop'=>'required'
        ],
            [
                'txtMalop.required'=>'Mã lớp không được để trống',
                'txtMalop.unique'=>'Mã lớp đã tồn tại',
                'txtTenlop.required'=>'Tên lớp không được để trống'
            ]);
        $malop = new MaLop;
        $malop->mslop = $request->txtMalop;
        $malop->ten_lop = $request->txtTenlop;
        $malop->save();
        return redirect('admin/malop/list')->with('thongbao', 'Thêm thành công');
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtTenlop'=>'required'
        ],
            [
                'txtTenlop.required'=>'Tên lớp không được để trống'
            ]);
        $malop = MaLop::find($id);
        $malop->mslop = $request->txtMalop;
        $malop->ten_lop = $request->txtTenlop;
        $malop->save();
        return redirect('admin/malop/list')->with('thongbao', 'Cập nhật thành công');
    }

    public function getDel($id)
    {
        $malop = MaLop::find($id);
        $malop->delete();
        return redirect('admin/malop/list')->with('thongbao', 'Xóa dữ liệu thành công');
    }

    public function getLop($id)
    {
        $malop = MaLop::find($id);
        $thongtin = ThongTinDoanVien::where('id_lop', $id)->get();
        $sodoan = SoDoan::all();
        $doanphi = DoanPhi::all();
        $diemren = DiemRen::all();
        return view('admin.malop.listtv', ['thongtin'=>$thongtin, 'malop'=>$malop, 'sodoan'=>$sodoan, 'doanphi'=>$doanphi, 'diemren'=>$diemren]);
    }

    public function postAddDV(Request $request)
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

        $malop = MaLop::find($request->MaLop);

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
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Thêm thành công');
    }

    public function postEditDV(Request $request, $id)
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

        $malop = MaLop::find($request->MaLop);

        $ttdv->hoten = $request->txtHoten;
        $ttdv->ngaysinh = $request->dtNgaysinh;
        $ttdv->phai = $request->rdoPhai;
        $ttdv->hokhau = $request->txtHokhau;
        $ttdv->ghichu = $request->txtGhichu;
        $ttdv->dp_denngay = $request->dtNgaydongdp;
        $ttdv->id_lop = $request->MaLop;
        $ttdv->songaythamgiahd = $request->nm_Songay;
        $ttdv->save();
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Cập nhật thành công');
    }

    public function getDelDV($id)
    {
        $ttdv = ThongTinDoanVien::find($id);
        $malop = MaLop::find($ttdv->id_lop);

        $ttdv->delete();
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Xóa dữ liệu thành công');
    }

    public function thongke()
    {
        $malop = Malop::all();
        $malopd = Malop::count();
        foreach ($malop as $ml)
        {
            $doanvien = ThongTinDoanVien::where('id_lop', $ml->id)->count();
            $dem[] = [
                'demsv'=> $doanvien,
            ];
        }

        return view('admin.thongke.thongke',['dem'=>$dem]);
    }
}
