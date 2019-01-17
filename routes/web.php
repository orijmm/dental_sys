<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('login', 'Auth\LoginController@getLogin')->name('login');
    Route::get('logout', 'Auth\LoginController@getLogout')->name('auth.logout');
    Route::post('authenticate', 'Auth\LoginController@authenticate');
    Route::get('registration', 'Auth\RegisterController@form_registration');
    Route::post('register', 'Auth\RegisterController@registration');
    Route::get('register/confirmation/{token}', 'Auth\LoginController@confirmEmail')->name('confirm.email');
    Route::get('password/remind', 'Auth\ForgotPasswordController@forgotPassword');
    Route::post('password/remind', 'Auth\ForgotPasswordController@sendPasswordReminder');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@getReset');
    Route::post('password/reset', 'Auth\ResetPasswordController@postReset');

    Route::get('/home', 'HomeController@index')->name('home');


    /**
     * Setting of system
    */
    Route::group([
         'prefix' => 'setting'
     ], function () {

        Route::get('/administration',
            'SettingController@administration')
            ->name('setting.administration');

        Route::post('/update',
            'SettingController@update')
            ->name('setting.update');

     });

    /**
     * Adminitrations of Users
    */

    Route::group([
         'prefix' => 'user'
     ], function () {
        Route::get('/password', 
            'UserController@password')->name('user.password');
        Route::put('/password', 
            'UserController@change_password')->name('user.password.update');
        Route::get('/setting', 
            'UserController@setting')->name('user.setting');
        Route::put('/setting', 
            'UserController@update_setting')->name('user.setting.update');
        Route::get('/{id}/sessions', 
            'UserController@sessions')->name('user.sessions');
        Route::delete('/{id}/sessions', 
            'UserController@invalidateSession')->name('user.sessions.invalidate');
    });   

    Route::resource('user', 'UserController');

    /**
     *  Adminitrations of Roles
    */
    Route::resource('role', 'RoleController');

    /**
     *  Adminitrations of Permissions
    */

    Route::post('permission/save', [
        'as' => 'permission.save',
        'uses' => 'PermissionController@saveRolePermissions'
    ]);
    
    Route::resource('permission', 'PermissionController');
    
    /**
    *  Profile
    */
    Route::put('profile/avatar', 'ProfileController@updateAvatar')->name('update.avatar');
    Route::resource('profile', 'ProfileController');

    /**
     *  Activitys
    */
    Route::get('activity/user/{id}', 'ActivityController@log_user')->name('activity.user');
    Route::resource('activity', 'ActivityController');

    /**
    * Dental sistem
    */
    Route::resource('appointment', 'AppointmentController');
    Route::resource('history', 'HistoryController');
    Route::resource('odontogram', 'OdontogramController');
    Route::resource('specialist', 'SpecialistController');
    Route::get('history/odonto/teeths/{id}','HistoryController@getTeeth')
    ->name('data.teeths');
    Route::get('history/edit/teeths/{id}','HistoryController@editTeeth')
    ->name('edit.teeth');
    Route::put('history/update/teeths/{id}','HistoryController@updateTeeth')
    ->name('teeth.put.update');

    Route::get('appointment/search/calendar','AppointmentController@search')
    ->name('appointment.calendar');

    Route::get('appointment/get/calendar','AppointmentController@getSearch')->name('appointment.search.get');
    

    Route::resource('numconsult', 'NumConsultController', ['except' => ['edit', 'update','show']]);
    Route::resource('patient', 'PatientController');
    
    Route::resource('specialty', 'SpecialtyController');
    Route::resource('teeth', 'TeethController');
    Route::resource('service', 'ServiceController');
    Route::resource('sale', 'SaleController');

    Route::get('sale/datos/service','SaleController@getServices')
    ->name('datos.services');

    Route::get('sale/change/bill','SaleController@changeBill')
    ->name('change.bill');

    Route::get('sale/change/charged','SaleController@changeCharge')
    ->name('change.charged');

    Route::get('ventas/reportes/vista','SaleController@showReporte')
    ->name('sales.reporte.show');

    