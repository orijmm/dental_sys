<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConceptoGasto extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'concepto_gastos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	  'detalle',
	  'user_id'	  
    ];

    public function user(){

        return $this->belongsTo('App\User','user_id');
    }


    public function gasto(){

        return $this->hasMany('App\Gasto','concepto_gastos_id');
    }

}
