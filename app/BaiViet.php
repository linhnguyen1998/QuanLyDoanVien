<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table ="baiviet";

    public function danhmucbaiviet()
    {
        return $this->belongsTo('App\DanhMucBaiViet', 'id_dm', 'id');
    }

}
