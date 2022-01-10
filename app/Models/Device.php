<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    
    protected $fillable = [
        'device_name',
        'uuid',
        'device_description',
        'coordinates',
        'device_key',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

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
                    ->select('users.email', 'users.name', 'passes.created_at', 'passes.approved');
    }
    
    public static function createKey()
    {
        $key = Str::random(6);
        while(count(Device::where('device_key', $key)->get())){
            $key = Str::random(6);
        }
        return $key;
    }

    public static function createUUID()
    {
        $uuid = Str::uuid();
        while(count(Device::where('uuid', $uuid)->get())){
            $uuid = Str::uuid();
        }
        return $uuid;
    }
}
