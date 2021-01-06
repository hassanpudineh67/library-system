<?php

use Illuminate\Http\Request;

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

Route::prefix('user')->group(function () {
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');
});

Route::prefix('management')->group(function () {
//    Route::middleware(['api-auth'])->group(function () {
        Route::prefix('book')->group(function () {
            Route::get('/list', 'Management\BookController@list');
            Route::post('/category-list', 'Management\BookController@listCategory');
            Route::post('/publisher-list', 'Management\BookController@listPublisher');
            Route::post('/search', 'Management\BookController@search');
            Route::post('/add', 'Management\BookController@create');
            Route::post('/edit', 'Management\BookController@edit');
            Route::post('/info', 'Management\BookController@getSingleBook');
        });
        Route::prefix('category')->group(function () {
            Route::get('/list', 'Management\CategoryController@list');
            Route::post('/add', 'Management\CategoryController@create');
            Route::post('/edit', 'Management\CategoryController@edit');
        });
        Route::prefix('publisher')->group(function () {
            Route::get('/list', 'Management\PublisherController@list');
            Route::post('/add', 'Management\PublisherController@create');
            Route::post('/edit', 'Management\PublisherController@edit');
        });
        Route::prefix('author')->group(function () {
            Route::get('/list', 'Management\AuthorController@list');
            Route::post('/add', 'Management\AuthorController@create');
            Route::post('/edit', 'Management\AuthorController@edit');
        });
        Route::prefix('translator')->group(function () {
            Route::get('/list', 'Management\TranslatorController@list');
            Route::post('/add', 'Management\TranslatorController@create');
            Route::post('/edit', 'Management\TranslatorController@edit');
        });
        Route::prefix('user')->group(function () {
            Route::prefix('staff')->group(function () {
                Route::get('/list', 'Management\UserController@getStaffs');
                Route::post('/add', 'Management\UserController@addStaff');
//                Route::post('/edit', 'Management\UserController@edit');
            });
            Route::prefix('patron')->group(function () {
                Route::get('/list', 'Management\UserController@getPatrons');
                Route::post('/verify', 'Management\UserController@verifyPatron');
//                Route::post('/add', 'Management\UserController@create');
//                Route::post('/edit', 'Management\UserController@edit');
            });
            Route::post('/edit', 'Management\UserController@editUser');
        });
        Route::prefix('rental')->group(function () {
            Route::get('/list', 'Management\RentingController@getAllRents');
            Route::get('/on-going', 'Management\RentingController@getOnGoingRents');
            Route::post('/rent', 'Management\RentingController@rent');
            Route::post('/withdraw', 'Management\RentingController@withdraw');
        });

//    });
});
