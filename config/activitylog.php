<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Also log to Laravel's default log handler
    |--------------------------------------------------------------------------
    |
    | If "alsoLogInDefaultLog" the activity will also be logged in the default
    | Laravel logger handler
    |
    */
    'alsoLogInDefaultLog' => true,

    /*
    |--------------------------------------------------------------------------
    | Max age in months for log records
    |--------------------------------------------------------------------------
    |
    | When running the cleanLog-command all recorder older than the number of months
    | specified here will be deleted
    |
    */
    'deleteRecordsOlderThanMonths' => 2,

    /*
    |--------------------------------------------------------------------------
    | Fallback user id if no user is logged in
    |--------------------------------------------------------------------------
    |
    | If you don't specify a user id when logging some activity and no
    | user is logged in, this id will be used.
    |
    */
    'defaultUserId' => '',

    /*
    |--------------------------------------------------------------------------
    | Handler that is called before logging is done
    |--------------------------------------------------------------------------
    |
    | If you want to disable logging based on some custom conditions, create
    | a handler class that implements the BeforeHandlerInterface and
    | reference it here.
    |
    */
    'beforeHandler' => null,
    
    /*
    |--------------------------------------------------------------------------
    | The class name for the related user model
    |--------------------------------------------------------------------------
    |
    | This can be a class name or null. If null the model will be determined 
    | from Laravel's auth configuration.
    |
    */
    'userModel' => App\User::class,

    /**
     * When set to false, no activities will be saved to database.
     */
    'enabled' => env('ACTIVITY_LOGGER_ENABLED', true),

    /**
     * When running the clean-command all recording activites older than
     * the number of days specified here will be deleted.
     */
    'delete_records_older_than_days' => 365,


    /**
     * When not specifying a log name when logging activity
     * we'll using this log name.
     */
    'default_log_name' => 'default',


    /**
     * When set to true, the subject returns soft deleted models.
     */
     'subject_returns_soft_deleted_models' => false,


    /**
     * This model will be used to log activity. The only requirement is that
     * it should be or extend the Spatie\Activitylog\Models\Activity model.
     */
    'activity_model' => \Spatie\Activitylog\Models\Activity::class, 
];
