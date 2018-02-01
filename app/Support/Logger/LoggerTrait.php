<?php

namespace App\Support\Logger;

use Activity;
use Auth;
use Illuminate\Database\Eloquent\Model;

trait LoggerTrait
{
    /**
     * LogAction
     * 
     * register a new action on the log.
     *
     * @param $message
     *
     */
    public function logAction($log = 'default', $message, $model = null)
    {
        $user_log = (Auth::guard()->check()) ? Auth::User()->id : null;

        if ($model) {
            return activity($log)
                ->performedOn($model)
               ->causedBy($user_log)
               ->log($message);
        } else {
            return activity($log)
               ->causedBy($user_log)
               ->log($message);
        }

    }
}
