<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiemRen extends Model
{
    protected $table = "diemren";
    protected $primaryKey = "mssv";
    public  $timestamps = false;

    public function thongtindoanvien()
    {
        return $this->belongsTo('App\ThongTinDoanVien','mssv', 'mssv');
    }
}
