<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuyDoan extends Model
{
    protected $table = "quydoan";
    public $timestamps = false;

    public function malop()
    {
        return $this->belongsTo('App\MaLop','id_lop','id');
    }

}
