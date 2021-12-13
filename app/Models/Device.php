<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'devices';
        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'device_name',
        'device_description',
        'coordinate_x',
        'coordinate_y',
    ];
}
