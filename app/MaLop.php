<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaLop extends Model
{
    protected $table = "malop";
    public $timestamps = false;
    public function thongtindoanvien()
    {
        return $this->hasMany('App\ThongTinDoanVien','id_lop','id');
    }

    public function quydoan()
    {
        return $this->hasMany('App\QuyDoan','id_lop','id');
    }
}
