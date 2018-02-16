<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function setBirthdayAttribute($value)
    {
        if ($value) {
            $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        }
    }

    public function getBirthdayAttribute($date)
    {
        if ($date) {
            return Carbon::parse($date)->format('d-m-Y');
        }
    }

    public function getFullName2Attribute()
    {
        return ucwords($this->full_name);
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment', 'patient_id');
    }
}
