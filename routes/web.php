<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'AuthController@loginShowForm');
Route::post('/', 'AuthController@login')->name('page.login');

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'revalidate'], function()
{
    Route::get('/dashboard', 'AdminController@admin')->name('dashboard'); 
});

Route::group(['middleware' => 'auth' ], function()
{
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard'); 

    Route::get('dashboard.active-visitor', 'AdminController@dashboard_active');
    Route::get('dashboard.exited-visitor', 'AdminController@dashboard_exited');
    Route::get('dashboard.blocked-visitor', 'AdminController@dashboard_blocked');
    Route::get('dashboard.total-visitor', 'AdminController@dashboard_total');
    //Route::get('/dashboard', 'AdminController@active_count');
    // Route::get('/dashboard', 'AdminController@exited_count');
    // Route::get('/dashboard', 'AdminController@block_count');
    // Route::get('/dashboard', 'AdminController@total_count');

    // Route::get('/dashboard', 'AdminController@count')->name('dashboard');
    
    Route::get('/dashboard', 'CountController@active_count'); 
    Route::get('/dashboard', 'CountController@exited_count'); 
    Route::get('/dashboard', 'CountController@blocked_count'); 
    Route::get('/dashboard', 'CountController@total_count'); 

    // Route::get('/dashboard', 'CountController@active_count')->name('dashboard'); 
    // Route::get('/dashboard', 'CountController@exited_count')->name('dashboard'); 
    // Route::get('/dashboard', 'CountController@blocked_count')->name('dashboard'); 
    // Route::get('/dashboard', 'CountController@total_count')->name('dashboard'); 
   
    Route::get('user-management/add', 'UserManagementController@addUserShowForm')->name('user-management.add');
    Route::any('user-management/search','UserManagementController@search')->name('user-management.search');
    Route::patch('user-management/status','UserManagementController@status')->name('user-management.status');
    Route::resource('user-management', 'UserManagementController');
   
    Route::any('userlog/search','UserLogController@search')->name('userlog.search');
    Route::resource('userlog', 'UserLogController');

    Route::get('page.user-profile', 'UserProfileController@profile');
    Route::post('page.user-profile', 'UserProfileController@update_avatar');
    
    Route::any('visitorlog/search','VisitorLogController@search')->name('visitorlog.search');
    Route::resource('visitorlog', 'VisitorLogController');

    Route::any('visitor-record/search','VisitorRecordController@search')->name('visitor-record.search');
    Route::resource('visitor-record', 'VisitorRecordController');

    Route::any('visitor-monitor/search','VisitorMonitorController@search')->name('visitor-monitor.search');
    Route::resource('visitor-monitor', 'VisitorMonitorController');

    Route::resource('visitor-register', 'VisitorRegisterController');

    Route::get('pagestatistic.statistic', 'StatisticController@statistic_view');
    Route::get('pagestatistic.frequentvisitor', 'StatisticController@frequent_visitor');
    Route::get('pagestatistic.frequentdestination', 'StatisticController@frequent_destination');
});