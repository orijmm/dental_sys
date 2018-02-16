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

    public function getFullNameAttribute($value)
    {
       return ucfirst($this->name) . ' ' . ucfirst($this->last_name);
    }
    
    public function specialties()
    {
        return $this->belongsTo('App\Specialty', 'specialty_id');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment', 'specialist_id');
    }
}
