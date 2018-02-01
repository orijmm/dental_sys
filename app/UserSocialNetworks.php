<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialNetworks extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_social_networks';

    public $timestamps = false;

    protected $fillable = [
    	'facebook', 
    	'twitter', 
    	'google_plus', 
    	'dribbble', 
    	'linked_in', 
    	'skype'
    ];
}
