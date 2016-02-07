<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transporting
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good[] $goods
 * @property integer $id
 * @property string $name
 * @property string $destination
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Transporting extends Model
{
    protected $table = 'transportings';

    protected $fillable = ['name', 'destination'];

    public function goods()
    {
        return $this->hasMany(Good::class);
    }

    public function single_good()
    {
        return $this->hasMany(Good::class);
    }
}
