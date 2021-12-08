<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
                /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'managers';
                /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'manager_id',
        'device_id',
    ];
}
