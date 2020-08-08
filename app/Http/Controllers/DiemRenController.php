<?php

namespace App\Http\Controllers;

use App\MaLop;
use Illuminate\Http\Request;
use App\DiemRen;
use App\ThongTinDoanVien;

class DiemRenController extends Controller
{
    public function getList()
    {
        $diemren = DiemRen::all();
        return view('admin.diemren.list',['diemren'=>$diemren]);
    }

    public function postAdd(Request $request)
    {
        $diemren = new DiemRen;
        $this->validate($request, [
            'ttdv'=>'required|unique:diemren,mssv',
            'txtDiem'=>'required',
        ],[
            'ttdv.unique'=>'Điểm rèn luyện của sinh viên đã có',
            'ttdv.required'=>'MSSV không được để trống',
            'txtDiem.required'=>'Điểm không được để trống',
        ]);

        $thongtin = ThongTinDoanVien::find($request->ttdv);
        $malop = MaLop::find($thongtin->id_lop);

        $diemren->mssv = $request->ttdv;
        $diemren->diem_lop = $request->txtDiem;
        $diemren->ghi_chu = $request->txtGhichu;
        $diemren->hoatdong = $request->txtHoatdong;
        $diemren->thanhtich = $request->txtThanhtich;
        $diemren->save();
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Thêm điểm rèn luyện thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtDiem'=>'required',
        ],[
            'txtDiem.required'=>'Điểm không được để trống',
        ]);
        $diemren = DiemRen::find($id);

        $thongtin = ThongTinDoanVien::find($diemren->mssv);
        $malop = MaLop::find($thongtin->id_lop);

        $diemren->diem_lop = $request->txtDiem;
        $diemren->ghi_chu = $request->txtGhichu;
        $diemren->hoatdong = $request->txtHoatdong;
        $diemren->thanhtich = $request->txtThanhtich;
        $diemren->save();
        return redirect('admin/malop/list/'.$malop->id)->with('thongbao', 'Cập nhật điểm rèn luyện thành công');
    }

    public function getDel($id)
    {
        $diemren = DiemRen::find($id);
        $diemren->delete();
        return redirect('admin/diemren/list')->with('thongbao', 'Xóa dữ liệu thành công');
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
