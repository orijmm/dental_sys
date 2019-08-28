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
	  'concepto_id',
	  'status',
	  'user_id'
    ];

    

}
