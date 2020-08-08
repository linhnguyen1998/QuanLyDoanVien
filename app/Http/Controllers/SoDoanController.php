<?php

namespace App\Http\Controllers;

use App\MaLop;
use Illuminate\Http\Request;
use App\SoDoan;
use App\ThongTinDoanVien;

class SoDoanController extends Controller
{
    public function getList()
    {
        $sodoan = SoDoan::all();
        return view('admin.sodoan.list', ['sodoan'=>$sodoan]);
    }

    public function postAdd(Request $request)
    {
        $sodoan = new SoDoan;
        $this->validate($request, [
            'ttdv'=>'required|unique:sodoan,mssv',
            'txtDonvi'=>'required',
        ],[
            'ttdv.required'=>'MSSV không được để trống',
            'ttdv.unique'=>'MSSV đã tồn tại trong sổ đoàn',
            'txtDonvi.required'=>'Đơn vị không được để trống',
        ]);
        $thongtin = ThongTinDoanVien::find($request->ttdv);
        $malop = MaLop::find($thongtin->id_lop);

        $sodoan->mssv = $thongtin->mssv;
        $sodoan->donvi = $request->txtDonvi;
        $sodoan->trangthairutsodoan = $request->rdoTrangthai;
        $sodoan->ghichu = $request->txtGhichu;
        $sodoan->save();
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Thêm sổ đoàn thành công');
    }

    public function postEdit(Request $request, $mssv)
    {
        $sodoan = SoDoan::find($mssv);
        $tt = ThongTinDoanVien::find($mssv);
        $malop = MaLop::find($tt->id_lop);
        $this->validate($request, [
            'txtDonvi'=>'required',
        ],[
            'txtDonvi.required'=>'Đơn vị không được để trống',
        ]);
        $sodoan->donvi = $request->txtDonvi;
        $sodoan->trangthairutsodoan = $request->rdoTrangthai;
        $sodoan->ghichu = $request->txtGhichu;
        $sodoan->save();
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Cập nhật sổ đoàn thành công');
    }

    public function getDel($id)
    {
        $sodoan = SoDoan::find($id);
        $sodoan->delete();
        return redirect('admin/sodoan/list')->with('thongbao', 'Xóa dữ liệu thành công');
    }

    public function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = ThongTinDoanVien::where('mssv', 'LIKE', "%{$query}%")->orWhere('hoten', 'LIKE', "%{$query}%")->get();
            $output = '<table class="table" style="position: absolute; background-color: #ffffff"><tbody>';
            foreach($data as $row)
            {
                $output .= '<tr><td style="cursor: pointer">'.$row->mssv.'</td></tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        }

    }
}
