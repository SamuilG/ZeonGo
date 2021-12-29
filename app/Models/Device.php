<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    
    protected $fillable = [
        'device_name',
        'device_description',
        'coordinate_x',
        'coordinate_y',
    ];

    protected $hidden = [
        'id'
    ];
    
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
