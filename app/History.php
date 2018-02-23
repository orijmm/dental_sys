<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	  'patient_id',
	  'odontogram_id',
	  'observations',
	  'specialist_id'
    ];

    public function specialist()
    {
        return $this->belongsTo('App\Specialist', 'specialist_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    public function odontogram()
    {
        return $this->belongsTo('App\Odontogram', 'odontogram_id');
    }
}
