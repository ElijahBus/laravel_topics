<?php

use App\Postcard;
use App\PostcardService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('message', function () {
    $postcardService = new PostcardService('DRC', 5,10);
    return $postcardService->hello('Hello dudue', 'him@hisdomain.com');
});

Route::get('facade', function () {
    return Postcard::hello("elijah", 'huhuu love facades');
});

// Test roles and permissions assignment

Route::prefix('manage')->middleware('role: superadministrator|editor|owner')->group(function () {
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
});

Route::get('/create-role', 'RoleController@createRole');
Route::get('/create-permission', 'PermissionController@createPermission');

Route::get('/attach-permission/{id}', 'RoleController@addPermission');
Route::get('/detach-permission/{id}', 'RoleController@removePermission');

Route::get('/attach-role-to-user/{user}', 'UserController@addRole');
Route::get('/detach-role-from-user/{user}', 'UserController@removeRole');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index')->name('users.all');
Route::get('/user/{id}', 'UserController@show')->name('user.show');
