<?php

namespace App\Repositories\Activity;

use App\Repositories\RepositoryInterface;

interface ActivityRepository extends RepositoryInterface
{
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
    public function paginate_search($take = 10, $user = null, $search = null, $status = null);

     /**
     * lists logs type
     */
    public function list_log_type();

    /**
     *  get activities for user
     */
    public function getLatestActivitiesForUser($userId, $take = 10);

}