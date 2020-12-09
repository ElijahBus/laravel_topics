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

// Test file copy

Route::get('copy', 'CopyFileController@copyFile');

// Test view composer

Route::get('/view/composer', 'HomeController@index');

// sessions & cookies

Route::get('/set-cookie', function (Request $request) {
    $response = new Response('Response from cookie');
    $response->withCookie(cookie('new-cookie', $request->path(), 1));

    return $response;
});

Route::get('get-cookie', function (Request $request) {
   $cookieValue = $request->cookie('new-cookie');

   return response()->json($cookieValue);
});

Route::get('set-session', function (Request $request) {
    return $request->session()->put('new-session', $request->ip());
});

Route::get('get-session', function (Request $request) {
    return $request->session()->get('new-session');
});

Route::get('forget-session', function (Request $request) {
   return $request->session()->forget('new-session');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
