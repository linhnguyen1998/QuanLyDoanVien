<?php

namespace App\Http\Controllers;

use App\DiemRen;
use App\DoanPhi;
use App\SoDoan;
use App\ThongTinDoanVien;
use Illuminate\Http\Request;
use App\DanhMucBaiViet;
use App\BaiViet;
use Carbon\Carbon;

class TrangChuController extends Controller
{
    public function getThongbao()
    {
        $baiviet = BaiViet::all()->take(10);
        return view('trangchu.thongbao',['baiviet'=>$baiviet]);
    }

    public function getTracuu()
    {
        //$baiviet = BaiViet::all()->take(10);
        return view('trangchu.tracuu');
    }
    public function getKetQua(Request $request)
    {
        if($request->get('tukhoa'))
        {
            $tukhoa = $request->get('tukhoa');
            $data = ThongTinDoanVien::where('mssv', 'LIKE', "%{$tukhoa}%")->orWhere('hoten', 'LIKE', "%{$tukhoa}%")->get();
            $output = '<ul class="list-group" style="cursor: pointer">';
            foreach($data as $row)
            {
                $output .= '<li class="list-group-item" style="cursor: pointer">'.$row->mssv.' - '.$row->hoten.'</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function getXuatKetQua(Request $request)
    {
        if($request->get('tukhoa'))
        {
            $tukhoa = $request->get('tukhoa');
            $mssv = substr($tukhoa, 0, 8);
            $thongtin  = ThongTinDoanVien::where('mssv', 'LIKE', "%{$mssv}%")->get();
            $output = '<div class="card text-white mb-3">
                <div class="card-header text-primary">
                    <img style="float: left; margin-right: 5px" src="admin_asset/12.png" width="50px" height="50px">
                    <span style="float: left;">TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VĨNH LONG
				  	</span>
                    <br>
                    <span class="text-sm" style="float: left;">www.vlute.edu.vn</span>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="4" class="text-center text-lg">THÔNG TIN ĐOÀN VIÊN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-dark" style="background-color: #ecf6ff">THÔNG TIN CÁ NHÂN</th>
                        </tr>';
            foreach($thongtin as $row)
            {
                //SỔ ĐOÀN
                $sodoan = SoDoan::find($row->mssv);
                if($sodoan != null)
                {
                    $dv = $sodoan->donvi;
                    if($sodoan->trangthairutsodoan == 0)
                        $trangthairut = "Chưa rút sổ";
                    elseif($sodoan->trangthairutsodoan == 1)
                        $trangthairut = "Đã rút sổ";
                }
                else {
                    $dv ="Chưa có thông tin";
                    $trangthairut ="";
                }


                //ĐOÀN PHÍ
                $doanphi = DoanPhi::find($row->mssv);
                if($doanphi != null)
                {
                    $tiendoan = $doanphi->sotien;
                    $handong = Carbon::createFromFormat('Y-m-d', $doanphi->ngayketthuc)->format('d-m-Y');
                    if($doanphi->trangthai == 0)
                        $trangthaidong = "Chưa thu";
                    elseif($doanphi->trangthai == 1)
                        $trangthaidong = "Đã thu";
                }
                else
                {
                    $handong = "Chưa có thông tin";
                    $tiendoan ="";
                    $trangthaidong="";
                }

                //ĐIỂM RÈN LUYỆN
                $diemren = DiemRen::find($row->mssv);
                if($diemren != null)
                {
                    $diem = $diemren->diem_lop;
                    if($diemren->thanhtich != "")
                        $thantich = $diemren->thanhtich;
                    else
                        $thantich = "Không";
                }
                else
                {
                    $diem = "Chưa có thông tin";
                    $thantich = "";
                }


                if($row->phai == 0)
                    $phai ="Nam";
                elseif($row->phai == 1)
                    $phai = "Nữ";
                $output .= '<tr>
                            <th>MSSV</th>
                            <td>'. $row->mssv .'</td>
                            <th>Giới tính</th>
                            <td>
                                '.$phai.'
                            </td>
                        </tr>
                        <tr>
                            <th>Họ tên</th>
                            <td>'.$row->hoten.'</td>
                            <th>Ngày sinh</th>
                            <td>'.Carbon::createFromFormat('Y-m-d', $row->ngaysinh)->format('d-m-Y').'</td>
                        </tr>
                        <tr>
                            <th>Lớp</th>
                            <td>'.$row->malop->ten_lop.'</td>
                            <th>Số ngày tham gia hoạt động</th>
                            <td>'.$row->songaythamgiahd.'</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-dark" style="background-color: #ecf6ff">THÔNG TIN SỔ ĐOÀN</th>
                        </tr>
                        <tr>
                            <th>Đơn vị</th>
                            <td>'. $dv .' <b class="badge badge-info">'.$trangthairut.'</b></td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-dark" style="background-color: #ecf6ff">THÔNG TIN ĐOÀN PHÍ</th>
                        </tr>
                        <tr>
                            <th>Hết hạn đóng</th>
                            <td>'.$handong.'</td>
                            <th>Số tiền cần đóng</th>
                            <td>'.$tiendoan.'đ <b class="badge badge-info">'.$trangthaidong.'</b></td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-dark" style="background-color: #ecf6ff">ĐIỂM RÈN LUYỆN ĐOÀN VIÊN</th>
                        </tr>
                        <tr>
                            <th>Điểm</th>
                            <td>'.$diem.'</td>
                            <th>Thành tích</th>
                            <td>'.$thantich.'</td>
                        </tr>';
            }
            $output .= '</tbody>
                    </table>
                </div>
            </div>';
            echo $output;
        }
    }
}
