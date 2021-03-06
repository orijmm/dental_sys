<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teeth extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teeths';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'odontogram_id',
    'c1',
    'c2',
    'c3',
    'c4',
    'c5',
    'all_c',
    ];

    /*public function teethColors()
    {
        if ($this->all_c !=) {
            # code...
        } else {
            # code...
        }
        
    }*/

    public function odontogram()
    {
        return $this->belongsTo('App\Odontogram', 'odontogram_id');
    }
}
