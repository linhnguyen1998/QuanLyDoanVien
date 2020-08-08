<?php

namespace App\Http\Controllers;

use App\MaLop;
use Illuminate\Http\Request;
//Xuất exel
use Input;
use Excel;

use App\ThongTinDoanVien;

class ExelController extends Controller
{
    public function downloadExel($type)
    {
        $data = ThongTinDoanVien::all();
        $malop = MaLop::all();
        foreach ($data as $row) {
            if($row->phai == 0)
                $phai = "Nam";
            elseif($row->phai == 1)
                $phai = "Nữ";

            //Lấy tên lớp
            foreach ($malop as $ml) {
                if ($row->id_lop == $ml->id)
                    $lop = $ml->ten_lop;
            }

            //$ngaysinh = $row->ngaysinh->setDateFormat('d-m-Y');

            $dv[] = array(
                'MSSV' => $row->mssv,
                'Họ và tên' => $row->hoten,
                'Ngày sinh' => $row->ngaysinh,
                'Giới tính' => $phai,
                'Hộ khẩu' => $row->hokhau,
                'Ghi chú' => $row->ghichu,
                'Tên lớp' => $lop,
                'Số ngày tham gia hoạt động' => $row->songaythamgiahd,
            );
        }
        return Excel::create('ThongTinDoanVien', function($excel) use ($dv) {
            $excel->sheet('DoanVienSheet', function($sheet) use ($dv)
            {
                $sheet->fromArray($dv);
            });
        })->download($type);
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'import_file'=>'required|'
        ]);
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {

                    $insert[] = [
                        'mssv' => $value->mssv,
                        'hoten' => $value->hoten,
                        'ngaysinh' => $value->ngaysinh,
                        'phai' => $value->phai,
                        'hokhau' => $value->hokhau,
                        'ghichu' => $value->ghichu,
                        'id_lop' => $value->id_lop,
                        'songaythamgiahd' => $value->songaythamgiahd,
                    ];
                }
                if(!empty($insert)){
                    $thongtin = new ThongTinDoanVien;
                    $thongtin->insert($insert);
                    return redirect('admin/thongtindv/list')->with('thongbao', 'Dữ liệu đã được upload thành công');
                }
            }
        }
        return back();
    }
}
