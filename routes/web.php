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
	
   return view('welcome');
});

Route::group(['prefix' => '', 'middleware' => ['auth', 'roles'], 'roles' => ['admin','instructor']], function (){
		Route::resource('card','\App\Http\Controllers\AdminSwim\CardController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
//swimmer Resources
/********************* swimmer ***********************************************/
Route::resource('swimmer','\App\Http\Controllers\Instructors\SwimmerController');
Route::post('swimmer/{id}/update','\App\Http\Controllers\Instructors\SwimmerController@update');
Route::get('swimmer/{id}/delete','\App\Http\Controllers\Instructors\SwimmerController@destroy');
Route::get('swimmer/{id}/deleteMsg','\App\Http\Controllers\Instructors\SwimmerController@DeleteMsg');
/********************* skill ***********************************************/

/*
Route::resource('skill/{id}/show','\App\Http\Controllers\AdminSwim\SkillController@show');
Route::resource('skill/{id}/create','\App\Http\Controllers\AdminSwim\SkillController@create');
Route::resource('skill/{id}/store','\App\Http\Controllers\AdminSwim\SkillController@store');
Route::get('skill/{id}/deleteMsg','\App\Http\Controllers\AdminSwim\SkillController@DeleteMsg');
Route::get('skill/{id}/delete','\App\Http\Controllers\AdminSwim\SkillController@destroy');
Route::get('skill/{id}/edit','\App\Http\Controllers\AdminSwim\SkillController@edit');
Route::post('skill/{id}/update','\App\Http\Controllers\AdminSwim\SkillController@update');
*/
//swimmer Resources
/********************* card ***********************************************/


Route::get('admin', 'Admin\\AdminController@index');
Route::get('admin/give-role-permissions', 'Admin\\AdminController@getGiveRolePermissions');
Route::post('admin/give-role-permissions', 'Admin\\AdminController@postGiveRolePermissions');
Route::resource('admin/roles', 'Admin\\RolesController');
Route::resource('admin/permissions', 'Admin\\PermissionsController');
Route::resource('admin/users', 'Admin\\UsersController');
Route::resource('crud/swimmers', 'Crud\\SwimmersController');
Route::get('logout', function ()
	{
		Auth::logout();
		return view('auth/login');
	});



Route::resource('admin/skill/store', 'SwimAdmin\\SkillController@store');
Route::resource('admin/skill/{card_id}/showAll', 'SwimAdmin\\SkillController@showAll');
Route::resource('admin/skill/{card_id}/create', 'SwimAdmin\\SkillController@create');
Route::resource('admin/skill/{id}/delete', 'SwimAdmin\\SkillController@destroy');
Route::resource('admin/skill/{id}/edit', 'SwimAdmin\\SkillController@edit');
Route::resource('admin/skill/{id}/update', 'SwimAdmin\\SkillController@update');
Route::resource('admin/skill-cards', 'SwimAdmin\\SkillCardsController');


//Route::resource('admin/skill/{skill_card_id}/store', 'SwimAdmin\\SkillController@store');