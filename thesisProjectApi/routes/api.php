<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//This is for looking who is active and inactive users
Route::get('allMemberUsers', 'findActiveAndInactiveUsers@returnAllMembers');

Route::post('addInactiveUser', 'findActiveAndInactiveUsers@userInactive');

//This is for creating account and for logging in
Route::get('list', 'Controls@allUsersFromAdminToMember');

Route::get('allAccounts', 'Controls@allAccount');

Route::post('login', 'authController@login');

Route::post('sign-up', 'authController@signUp');

Route::post('userProfile', 'App\Http\Controllers\Controls@getUserInfo');


//This is for the logged users matter
Route::post('/info','UserDisplayController@getUsers');

// Route::get('/info/edit', 'UserDisplayController@editUserInfo');

// Route::post('/info/update', 'UserDisplayController@updateUserInfo');

Route::post('getCurrentUser', 'App\Http\Controllers\LoggedUserMatters@getTheCurrentUser');

Route::get('edit', 'UserDisplayController@edit');

Route::post('updateUser', 'UserDisplayController@update');

// Route::post('member', 'UserDisplayController@insert');

Route::post('leader', 'Controls@getCell');

Route::post('cell', 'Controls@getLeader');

Route::post('network', 'Controls@getNetwork');

Route::post('currentUserRole', 'Controls@getRolesById');

Route::get('getAllUserRoles', 'Controls@cell');

Route::get('users', 'Controls@cell');

Route::post('attendance', 'attendanceController@getDay');

Route::get('vip-users', 'returnVipUsers@retrieveAllVipUsers');

Route::get('vip-user-with-leader', 'returnVipUsers@retrieveVipUsersWithLeader');

Route::get('all-new-unvip-members', 'returnVipUsers@allRecordedNewMember');

Route::post('get-user-attendance', 'attendanceController@viewAttendance');

Route::post('current-user-attendance', 'attendanceController@returnCurrentUserAttendance');

Route::post('user-attendance-year-selected', 'attendanceController@currentUsersAttendanceYear');

Route::post('viewAttendancesOfSCandEvents', 'attendanceController@viewAttendanceSCandEvents');

Route::post('viewAttendancesOfCellGroup', 'attendanceController@viewCellAttendance');

Route::get('regular-members', 'attendanceController@returnRegularMembers');

Route::post('leader-sc-cg', 'attendanceController@returnEventsandSC');


// Auth::routes();


//This is for Auxiliary
Route::post('profile/auxiliary', 'AuxiliaryController@index');

//This is for Ministries
Route::post('profile/ministries', 'MinistriesController@index');

Route::get('ministries', 'MinistriesController@getMinistry');

Route::get('ministries/list', 'MinistriesController@ministryList');

Route::post('ministries/add/{id}', 'MinistriesController@store');

Route::post('return-weekly-attendance', 'attendanceController@returnWeeklyAttendance');


