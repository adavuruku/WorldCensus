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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/greeting', function () {
    return 'Hello World';
});

//parameters are marked wih {}
Route::get('/user/well/{id}', function (Request $request, $id) {
    return 'User '.$request;
});

//routes are injected base on their order, the name doesnt matter

// here post -> postId and comment -> commentId
// Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId)
// here post -> commentId  and comment -> postId
// Route::get('/posts/{post}/comments/{comment}', function ($commentId, $postId)
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Post description Post '.$postId.' Comment '.$commentId;
});

// remember route parameters comes after dependencies -> i.e the Request dependecy comes before $id parameters
// Route::get('/user/{id}', function (Request $request, $id) {
//     return 'User '.$id;
// });
//optional parameter
Route::get('/cool/{name?}', function ($name = 'John') {
    return $name;
});

/*using regex
Route::get('/user/{name}', function ($name) {
    //
})->where('name', '[A-Za-z]+');

Route::get('/user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');

Route::get('/user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/user/{id}/{name}', function ($id, $name) {
    //
})->whereNumber('id')->whereAlpha('name');

Route::get('/user/{name}', function ($name) {
    //
})->whereAlphaNumeric('name');

Route::get('/user/{id}', function ($id) {
    //
})->whereUuid('id');
*/

/*#setting global pettern constraints
// you can set a route patter in the boot session of the route service provider, so the regexp constraints apply to all  route in the <applet></applet>
public function boot()
{
    Route::pattern('id', '[0-9]+');
}
in the route file you cn have

Route::get('/user/{id}', function ($id) {
    // Only executed if {id} is numeric...
});
*/

//#allowing forward slashes to be part of the parameters
Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*'); // search/seee/ -> it will see seee/ as parameter value for search
// Route::get('country', 'Country\CountryController@Country');