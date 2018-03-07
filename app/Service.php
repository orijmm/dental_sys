<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name',
    'cost',
    'status'
        ];

    /*public function specialists()
    {
        return $this->hasMany('App\Specialist', 'specialty_id');
    }*/
}
