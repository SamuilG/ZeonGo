<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'passes';

            /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'device_id',
        'user_id'
    ];
}