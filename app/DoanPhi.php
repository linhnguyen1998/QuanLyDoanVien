<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoanPhi extends Model
{
    protected $table = "doanphi";
    protected $primaryKey = "mssv";
    public $timestamps = false;

    public function thongtindoanvien()
    {
        return $this->belongsTo('App\ThongTinDoanVien','mssv', 'mssv');
    }
}
