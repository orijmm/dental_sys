<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumConsult extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'num_consults';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name_consult'
    ];

    public function appointment()
    {
        return $this->hasMany('App\Appointment', 'num_consult_id');
    }
}
