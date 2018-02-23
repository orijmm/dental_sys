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

    public function histories()
    {
        return $this->hasOne('App\History', 'odontogram_id');
    }

    public function teeth()
    {
        return $this->hasMany('App\Teeth', 'odontogram_id');
    }
}
