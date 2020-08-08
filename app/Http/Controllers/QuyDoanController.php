<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuyDoan;
use App\MaLop;

class QuyDoanController extends Controller
{
    public function getList()
    {
        $malop = MaLop::all();
        $quydoan = QuyDoan::all();
        return view('admin.quydoan.list', ['quydoan'=>$quydoan, 'malop'=>$malop]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtKhoantien'=>'required',
            'txtTienthu'=>'required|integer',
            'txtTienchi'=>'required|integer',
            'txtNam'=>'required|integer',
            'txtNguoithu'=>'required',
            'MaLop'=>'required',
        ],
            [
                'txtKhoantien.required'=>'Tên khoản tiền không được để trống',
                'txtTienthu.required'=>'Tiền thu không được để trống',
                'txtTienchi.required'=>'Tiền chi không được để trống',
                'txtNam.required'=>'Năm không được để trống',
                'txtNguoithu.required'=>'Người thu không được để trống',
                'MaLop.required'=>'Vui lòng chọn lớp',
                'txtTienthu.integer'=>'Tiền thu phải là số',
                'txtTienchi.integer'=>'Tiền chi phải là số',
                'txtNam.integer'=>'Năm phải là số',

            ]);
        $quydoan = new QuyDoan;
        $quydoan->ten_khoan_tien = $request->txtKhoantien;
        $quydoan->tien_thu = $request->txtTienthu;
        $quydoan->tien_chi = $request->txtTienchi;
        $quydoan->nam = $request->txtNam;
        $quydoan->id_lop = $request->MaLop;
        $quydoan->nguoi_thu = $request->txtNguoithu;
        $quydoan->save();
        return redirect('admin/quydoan/list')->with('thongbao', 'Thêm thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtKhoantien'=>'required',
            'txtTienthu'=>'required|integer',
            'txtTienchi'=>'required|integer',
            'txtNam'=>'required|integer',
            'txtNguoithu'=>'required',
            'MaLop'=>'required',
        ],
            [
                'txtKhoantien.required'=>'Tên khoản tiền không được để trống',
                'txtTienthu.required'=>'Tiền thu không được để trống',
                'txtTienchi.required'=>'Tiền chi không được để trống',
                'txtNam.required'=>'Năm không được để trống',
                'txtNguoithu.required'=>'Người thu không được để trống',
                'MaLop.required'=>'Vui lòng chọn lớp',
                'txtTienthu.integer'=>'Tiền thu phải là số',
                'txtTienchi.integer'=>'Tiền chi phải là số',
                'txtNam.integer'=>'Năm phải là số',

            ]);
        $quydoan = QuyDoan::find($id);
        $quydoan->ten_khoan_tien = $request->txtKhoantien;
        $quydoan->tien_thu = $request->txtTienthu;
        $quydoan->tien_chi = $request->txtTienchi;
        $quydoan->nam = $request->txtNam;
        $quydoan->id_lop = $request->MaLop;
        $quydoan->nguoi_thu = $request->txtNguoithu;
        $quydoan->save();
        return redirect('admin/quydoan/list')->with('thongbao', 'Cập nhật thành công');
    }

    public function getDel($id)
    {
        $quydoan = QuyDoan::find($id);
        $quydoan->delete();
        return redirect('admin/quydoan/list')->with('thongbao', 'Xóa dữ liệu thành công');
    }
}
