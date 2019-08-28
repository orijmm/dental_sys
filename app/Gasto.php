<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gastos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	  'detalle',
	  'concepto_gastos_id',
	  'status',
	  'user_id'
    ];

    public function concepto()
    {
        return $this->belongTo('App\Concepto', 'concepto_gastos_id');
    }

    public function user()
    {
        return $this->belongTo('App\User', 'user_id');
    }
    

}
