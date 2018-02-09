<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
