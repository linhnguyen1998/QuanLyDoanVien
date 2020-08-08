<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinDoanVien extends Model
{
    protected $table = "thongtindoanvien";
    protected $primaryKey = 'mssv';
    public $timestamps = false;

    public function doanphi()
    {
        return $this->hasMany('App\DoanPhi','mssv','mssv');
    }

    public function diemren()
    {
        return $this->hasMany('App\DiemRen','mssv','mssv');
    }

    public function malop()
    {
        return $this->belongsTo('App\MaLop','id_lop','id');
    }

    public function sodoan()
    {
        return $this->hasMany('App\SoDoan','mssv','mssv');
    }

}
