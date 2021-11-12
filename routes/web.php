<?php

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

Route::get('/',"BlogController@index")->name('blog.index');
Route::get('/detail/{id}',"BlogController@detail")->name('blog.detail');
Route::view('/about','Blog.about')->name('about');
Route::get('/category/{id}',"BlogController@baseOnCategory")->name('baseOnCategory');


Auth::routes();

Route::prefix('dashboard')->middleware("auth")->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('category','CategoryController');
    Route::resource('Article','ArticleController');


    Route::prefix('profile')->group(function (){
        Route::get('/index','ProfileController@index')->name("profile.index");
//--------------------------change name----------------------//
        Route::get('/change-name',"ProfileController@changeName")->name("profile.changeName");
        Route::post('/update-name',"ProfileController@updateName")->name("profile.updateName");
//--------------------------change email----------------------//
        Route::get('/change-email',"ProfileController@changeEmail")->name("profile.changeEmail");
        Route::post('/update-email',"ProfileController@updateEmail")->name("profile.updateEmail");
//---------------------------Chaneg Password--------------------//
        Route::get('/change-password',"ProfileController@changePassword")->name("profile.changePassword");
        Route::post('/update-password',"ProfileController@updatePassword")->name("profile.updatePassword");
//---------------------------Chaneg Photo--------------------//

        Route::get('/edit-photo',"ProfileController@changePhoto")->name("profile.changePhoto");
        Route::post('/edit-photo',"ProfileController@updatePhoto")->name("profile.updatePhoto");

    });
});

