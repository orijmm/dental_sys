<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'full_name',
    'dni',
    'birthday',
    'phone'
    ];
}
