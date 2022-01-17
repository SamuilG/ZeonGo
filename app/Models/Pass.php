<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;
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
        'user_id',
        'approved',
        'invited_by',
        'approved_by',
    ];
    public function invitedBy()
    {
        return User::find($this->invited_by)->name;   
    }
    public function approvedBy()
    {
        return User::find($this->approved_by)->name;   
    }
}
