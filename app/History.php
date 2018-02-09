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
      'cod' ,
	  'patient_id',
	  'odontogram_id',
	  'observations',
	  'specialist_id'
    ];
}
