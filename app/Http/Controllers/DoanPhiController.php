<?php

namespace App\Http\Controllers;

use App\MaLop;
use Illuminate\Http\Request;
use App\DoanPhi;
use App\ThongTinDoanVien;

class DoanPhiController extends Controller
{
    public function getList()
    {
        $doanphi = DoanPhi::all();
        return view('admin.doanphi.list',['doanphi'=>$doanphi]);
    }

    public function postAdd(Request $request)
    {
        $doanphi = new DoanPhi;
        $this->validate($request, [
            'ttdv'=>'required|unique:doanphi,mssv',
            'txtTieude'=>'required',
            'dtNgaythu'=>'required',
            'dtHetthu'=>'required',
            'nmSotien'=>'required'
        ],[
            'ttdv.required'=>'MSSV không được để trống',
            'ttdv.unique'=>'MSSV đã tồn tại trong đoàn phí',
            'txtTieude.required'=>'Tiêu đề không được để trống',
            'dtNgaythu.required'=>'Vui lòng chọn ngày thu',
            'dtHetthu.required'=>'Vui lòng chọn ngày kết thu tiền',
            'nmSotien.required'=>'Vui lòng chọn số tiền cần thu'
        ]);
        //$mssv = ThongTinDoanVien::find($request->ttdv);

        $thongtin = ThongTinDoanVien::find($request->ttdv);
        $malop = MaLop::find($thongtin->id_lop);

        $doanphi->mssv = $request->ttdv;
        $doanphi->tieude = $request->txtTieude;
        $doanphi->ngaythu = $request->dtNgaythu;
        $doanphi->ngayketthuc = $request->dtHetthu;
        $doanphi->sotien = $request->nmSotien;
        $doanphi->trangthai = $request->rdoTrangthai;
        $doanphi->save();
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Thêm đoàn phí thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtTieude'=>'required',
            'dtNgaythu'=>'required',
            'dtHetthu'=>'required',
            'nmSotien'=>'required'
        ],[
            'txtTieude.required'=>'Tiêu đề không được để trống',
            'dtNgaythu.required'=>'Vui lòng chọn ngày thu',
            'dtHetthu.required'=>'Vui lòng chọn ngày kết thu tiền',
            'nmSotien.required'=>'Vui lòng chọn số tiền cần thu'
        ]);
        $doanphi = DoanPhi::find($id);

        $thongtin = ThongTinDoanVien::find($doanphi->mssv);
        $malop = MaLop::find($thongtin->id_lop);

        $doanphi->tieude = $request->txtTieude;
        $doanphi->ngaythu = $request->dtNgaythu;
        $doanphi->ngayketthuc = $request->dtHetthu;
        $doanphi->sotien = $request->nmSotien;
        $doanphi->trangthai = $request->rdoTrangthai;
        $doanphi->save();
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Cập nhật đoàn phí thành công');
    }

    public function getDel($id)
    {
        $doanphi = DoanPhi::find($id);
        $doanphi->delete();
        return redirect('admin/doanphi/list')->with('thongbao', 'Xóa dữ liệu thành công');
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
