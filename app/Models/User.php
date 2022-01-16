<?php

namespace App\Models;

use App\Models\Pass;
use App\Models\History;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'uuid',
        'name',
        'email',
        'password',
        'email_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function devices()
    {
        return $this->hasMany(Pass::class)
            ->join('devices', 'passes.device_id', '=', 'devices.id');
    }

    public function devicesCoords()
    {
        return $this->hasMany(Pass::class)
            ->join('devices', 'passes.device_id', '=', 'devices.id')
            ->select('devices.device_name', 'devices.coordinates')
            ->get()
            ->toJson();
    }
    public function history()
    {
        return $this->hasMany(History::class)
            ->join('devices', 'history.device_id', '=', 'devices.id')
            ->orderBy('history.created_at', 'DESC');
    }

    public static function createUUID()
    {
        $uuid = Str::uuid();
        while(count(User::where('uuid', $uuid)->get())){
            $uuid = Str::uuid();
        }
        return $uuid;
    }

    public function isManager($device_id)
    {
        $row = Manager::where('user_id', $this->id)
            ->where('device_id', $device_id)
            ->get();
        if (count($row)) {
            return true;
        }
        return false;
    }
}
