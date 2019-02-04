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

Auth::routes();

Route::group(['prefix' => 'administrator','middleware'=> ['auth','acheck']],function() {
    //index
    Route::get('/',['uses' => 'Admin\IndexController@index','as' => 'admin-index']);
    Route::get('/chart/data',['uses' => 'Admin\IndexController@getData','as' => 'admin-index-get-chart']);
    Route::resource('pages', 'Admin\PagesController');
    Route::resource('settings', 'Admin\SettingsController');
    Route::resource('contact-applications', 'Admin\ContactApplicationsController');
    Route::resource('free-applications', 'Admin\FreeSessionApplicationController');
    Route::get('free-applications/download/pdf/{free_application}',['uses' => 'Admin\FreeSessionApplicationController@getPdf','as' => 'free-applications-pdf-download']);
    Route::resource('tests-results', 'Admin\TestsResultsController');
    Route::resource('datas', 'Admin\DatasController');
    Route::resource('blogs', 'Admin\BlogController');
    Route::resource('blogs-comments', 'Admin\BlogCommentsController');
    Route::resource('ultimate-desicions', 'Admin\UltimateController');
    Route::post('blogs/alias/get','Admin\BlogController@getAlias')->name('admin-blog-get-alias');
    Route::post('image/upload','Admin\FilesController@storeFile')->name('admin-blog-get-alias');

    //programs
    Route::resource('programs', 'Admin\ProgramsController');
    Route::resource('power-transformation', 'Admin\PowerTransformationController');
    Route::resource('faq', 'Admin\FaqController');

    //testimonials
    Route::resource('testimonials', 'Admin\TestimonialsController');
});

Route::post('/applications/contact/stote','Pub\ApplicationsController@contactStore')->name('public-applications-contact-store');
Route::post('/applications/free/stote','Pub\ApplicationsController@freeStore')->name('public-applications-free-store');
Route::post('/tests/result/store','Pub\TestsResultsController@resultStore')->name('public-tests-result-store');
Route::post('/power/store','Pub\TestsResultsController@powerStore')->name('public-power-store');
Route::post('/ultimate-decision/store','Pub\ApplicationsController@ultimateStore')->name('public-ultimate-decision-store');

Route::get('blog','Pub\BlogController@index')->name('public-blog');
Route::get('blog/{blog}','Pub\BlogController@show')->name('public-blog-show');
Route::post('comment/store/{blog}','Pub\BlogCommentsController@store')->name('public-blog-comments-store');

// Client stories
Route::get('/client-stories','Pub\PagesController@getClientStories')->name('public-client-stories-page');
Route::get('/client-stories/get/section/{section}/{alias?}','Pub\PagesController@getSection')->name('public-get-section');
Route::post('/client-stories/store','Pub\PagesController@storyStore')->name('public-add-story');

// Subscribe
Route::post('/subscribe','Pub\PagesController@subscribe')->name('public-subscribe');
// Free audion subscribe
Route::post('/audio-subscribe','Pub\PagesController@audioSubscribe')->name('public-audio-subscribe');

// Pages
Route::get(
    '/{alias?}',
    'Pub\PagesController@index')
    ->name('public-pages');

//programs
Route::get('programs/{program?}', 'Pub\ProgramsController@index')->name('public-programs');
