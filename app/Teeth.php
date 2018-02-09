<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teeth extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teeths';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'odontogram_id',
    'c1',
    'c2',
    'c3',
    'c4',
    'c5'
    ];
}
