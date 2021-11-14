<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {


        /**
         * Permission x Profile
         */
        Route::get('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');


        /**
         * Route Permissions
         */

        Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
        Route::resource('permissions', 'ACL\PermissionController');

        /**
         * Route Profiles
         * */
        Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
        Route::resource('profiles', 'ACL\ProfileController');



        /* Route Details Plans */

    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plans.index');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plans.create');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plans.store');
    Route::get('plans/{url}/details/{id}/edit', 'DetailPlanController@edit')->name('details.plans.edit');
    Route::put('plans/{url}/details/{id}', 'DetailPlanController@update')->name('details.plans.update');
    Route::get('plans/{url}/details/{id}', 'DetailPlanController@show')->name('details.plans.show');
    Route::delete('plans/{url}/details/{id}', 'DetailPlanController@destroy')->name('details.plans.destroy');

        /* Route Plans */

    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans', 'PlanController@index')->name('plans.index');


    /* Route Home Dashboard */

    Route::get('/', 'PlanController@index')->name('admin.index');
});





Route::get('/', function () {
    return view('welcome');
});
