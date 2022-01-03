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


    public function history()
    {
        return $this->hasMany(History::class)
                    ->join('users', 'history.user_id', '=', 'users.id')
                    ->select('users.email', 'history.created_at');
    }
    public function users()
    {
        return $this->hasMany(Pass::class)
                    ->join('users', 'passes.user_id', '=', 'users.id')
                    ->select('users.email', 'passes.created_at');
    }
}
