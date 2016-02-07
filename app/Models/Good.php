<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good
 *
 * @property-read \App\Models\Transporting $transporting
 * @property integer $id
 * @property string $name
 * @property integer $weight
 * @property integer $transporting_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Good extends Model
{
    protected $table = 'goods';

    protected $fillable = ['name', 'weight'];

    public function transporting()
    {
        return $this->belongsTo(Transporting::class);
    }
}
