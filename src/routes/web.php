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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/login-google', function() {
    return Socialite::with('Google')->redirect();
})->name('loginGoogle');

Route::get('/google-callback', 'Auth\SocialAuthController@loginGoogleCallback')->name('googleCallback');

// facebook login
Route::get('/login-facebook', function() {
    return Socialite::with('Facebook')->redirect();
})->name('loginFacebook');

Route::get('/facebook-callback', 'Auth\SocialAuthController@loginFacebookCallback')->name('facebookCallback');


// admin route
Route::get('/admin', 'AdminController@home')->middleware('role:admin')->name('adminHome');

// admin category routes
Route::resource(
    '/admin/category',
    'Admin\CategoryAdminController',
    [
        'names' => 'adminCategory'
    ]
);
//admin product
Route::prefix('admin')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', 'Admin\ProductAdminController@index')->name('list.product');
        Route::get('/create', 'Admin\ProductAdminController@create')->name('create.product');
        Route::post('/create', 'Admin\ProductAdminController@store');
        Route::get('/edit/{id}', 'Admin\ProductAdminController@edit')->name('edit.product');
        Route::post('/edit/{id}', 'Admin\ProductAdminController@update');
        Route::delete('/delete/{id}', 'Admin\ProductAdminController@destroy')->name('delete.product');

    });

});

Route::get('/admin/category/delete/{id}', 'Admin\CategoryAdminController@deleteForm')->name('adminCategoryDeleteForm');

// User routes
Route::get('/profile', 'UserController@profile')->middleware('role:user')->name('profile');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/{url}', function($name)
{
    return view('welcome');
})
->where('url', '[A-Za-z0-9\-]+');




