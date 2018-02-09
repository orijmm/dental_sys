<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odontogram extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'odontograms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'patient_id'
    ];
}
