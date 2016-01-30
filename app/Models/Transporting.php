<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transporting
 *
 */
class Transporting extends Model
{
    protected $table = 'transportings';

    public function goods()
    {
        return $this->hasMany(Good::class);
    }
}
