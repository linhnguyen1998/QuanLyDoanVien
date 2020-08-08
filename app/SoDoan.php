<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoDoan extends Model
{
    protected $table = "sodoan";
    protected $primaryKey = "mssv";
    public $timestamps = false;
    public function thongtindoanvien()
    {
        return $this->belongsTo('App\ThongTinDoanVien','mssv','mssv');
    }

}

