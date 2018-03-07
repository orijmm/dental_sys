<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;
use Carbon\Carbon;

class Sale extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'specialist_id',
        'bill',
        'charged',
        'date'
        ];

    public function setDateAttribute($value)
    {
        if ($value) {
            $this->attributes['date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        }
    }

    public function getDateAttribute($date)
    {
        if ($date) {
            return Carbon::parse($date)->format('d-m-Y');
        }
    }
     /**
     * Set specified sale_service.
     *
     * @param $saleId
     * @param $serviceId
     * @return mixed
     */
    public function setService($saleId, $serviceId)
    {
        $this->find($saleId)->services()->sync($serviceId);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'sale_service');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    public function specialists()
    {
        return $this->belongsTo('App\Specialist', 'specialist_id');
    }
}
