<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'goods';

    public function transporting()
    {
        return $this->belongsTo(Transporting::class);
    }
}
