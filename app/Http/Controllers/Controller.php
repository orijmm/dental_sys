<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	if(Auth::check()){
		    $user = User::find(Auth::user()->id);
		    Session::put('locale',$user->lang);
		}
    }
}
