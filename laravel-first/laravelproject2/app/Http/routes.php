 <?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Route::resource('/', "UserController");



Route::auth();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
    });

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
});



Route::resource('/user', "UserController");
Route::resource('/post', "PostController");
Route::resource('/comment', "CommentController");
//Route::post('/comment/store', "CommentController@store");
/*
Route::get('/post', "PostController@index");
Route::get('/post/create', "PostController@create");
Route::post('/post/store', "PostController@store");
Route::get('/post/{id}', "PostController@show");
Route::get('/post/{id}/edit', "PostController@edit");
Route::put('/post/{id}', "PostController@update");
Route::delete('/post/{id}', "PostController@destroy");
/*
GET 		/photos 				index 		photos.index
GET 		/photos/create 			create 		photos.create
POST 		/photos          		store 		photos.store
GET 		/photos/{photo} 		show 		photos.show
GET 		/photos/{photo}/edit 	edit 		photos.edit
PUT/PATCH 	/photos/{photo} 		update 		photos.update
DELETE 		/photos/{photo} 		destroy 	photos.destroy


/*Route::sote('/post', "PostController");
Route::resource('/post', "PostController");*/

