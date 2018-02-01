<?php

namespace App\Repositories\Activity;

use App\User;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\Repository;

class EloquentActivity extends Repository implements ActivityRepository
{
    /**
     * EloquentActivity constructor
     *
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        parent::__construct($activity);
    }

    /**
     * Paginate and search
     *
     * return the result paginated for the take value and with the attributes.
     *
     * @param int $take
     * @param string $search
     *
     * @return mixed
     *
     */
    public function paginate_search($take = 10, $user = null, $search = null, $status = null)
    {
        if ($user) {
           $query = Activity::where('causer_id', $user);
        } else {
           $query = Activity::query();  
        }

        if ($search) {
            $searchTerms = explode(' ', $search);
            $query->where( function ($q) use($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->orwhere('description', "like", "%{$term}%");
                }
            });
        }

        if ($status) {
            $query->where('log_name', $status);
        }

        $result = $query->paginate($take);

        if ($search) {
            $result->appends(['search' => $search]);
        }

        if ($status) {
            $result->appends(['status' => $status]);
        }

        if ($user) {
            $result->appends(['user' => $user]);
        }

        return $result;
    }

    /**
     * lists logs type
     */
    public function list_log_type()
    {
        $result = array();
        $activities = Activity::all();
        foreach ($activities as $activity) {
            $result[$activity['log_name']] = trans('app.'.$activity['log_name']);
        }

        return array_unique($result);
    }

    /**
     *  get activities for user
     */
    public function getLatestActivitiesForUser($userId, $take = 10)
    {
        return Activity::where('causer_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->limit($take)
            ->get();
    }

}