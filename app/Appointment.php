<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'appointments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'num_consult_id',
    'patient_id',
    'specialist_id',
    'elije',
    'datetime',
    'status'
    ];

    protected $choose = [
        'Emergencia' => 'Emergencia',
        'Control' => 'Control',
        'Primera Cita' => 'Primera Cita'
    ];

    public function getchoose()
    {
        return $this->choose;
    }

    public function setDatetimeAttribute($value)
    {
        if ($value) {
            $this->attributes['datetime'] = Carbon::createFromFormat('d-m-Y H:i A', $value)->format('Y-m-d H:i');
        }
    }

    public function getDatetimeAttribute($date)
    {
        if ($date) {
            return Carbon::parse($date)->format('d-m-Y h:i A');
        }
    }

    public function numconsults()
    {
        return $this->belongsTo('App\NumConsult', 'num_consult_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    public function specialties()
    {
        return $this->belongsTo('App\Specialist', 'specialist_id');
    }
}
