<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucBaiViet extends Model
{
    protected $table = "dmbaiviet";
    public $timestamps = false;
    public function baiviet()
    {
        return $this->hasMany('App\BaiViet','id_dm', 'id');
    }
}
