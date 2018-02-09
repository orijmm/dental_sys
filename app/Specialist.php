<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'specialists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'specialty_id',
    'name',
    'last_name',
    'email',
    'phone',
    'dni',
    'status'
    ];
}
