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


Route::post('logout','Admin\AdminController@logout');
Auth::routes();
Route::get('/home', 'Admin\AdminController@index')->name('home');

Route::get('/admin/polls/save_polls', 'Admin\\PollsController@save_polls'); 

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
Route::post('admin/news/image_delete/{id}/{file}','Admin\\NewsController@delete_image');
Route::post('admin/photosessions/image_delete/{id}/{file}','Admin\\PhotosessionsController@delete_image');
Route::get('/admin/polls/create_items','Admin\\PollsController@create_items');
Route::post('/admin/polls_add','Admin\\PollsController@polls_add');
Route::get('/admin/polls/status/{status}','Admin\\PollsController@status');
Route::get('/admin/episodes/create_new_week', 'Admin\\EpisodesController@create_new_week');

Route::post('sortprogram','Admin\\ProgrammesController@sortprogram');
Route::resource('/admin/polls_image','Admin\\ImagePollsController');
Route::resource('/admin/upload_image','Admin\\ImagePollsController');
Route::resource('admin/news', 'Admin\\NewsController');
Route::post('/admin/news/face_status/{id}', 'Admin\\NewsController@faceActivet');
Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/programmes', 'Admin\\ProgrammesController');
Route::resource('admin/episodes', 'Admin\\EpisodesController');
Route::resource('admin/archive', 'Admin\\ArchiveController');
Route::resource('admin/photosessions', 'Admin\\PhotosessionsController');
Route::resource('admin/about', 'Admin\\AboutController');
Route::resource('admin/questions', 'Admin\\QuestionsController');
Route::resource('admin/polls', 'Admin\\PollsController');
Route::resource('admin/polls_candidate', 'Admin\\PollsCandidateController');
Route::resource('admin/top_-images', 'Admin\\Top_ImagesController');
Route::resource('admin/about_us', 'Admin\\AboutUsController');
Route::resource('admin/vacant_jobs', 'Admin\\VacantJobController');
Route::resource('admin/polls_save', 'Admin\\PollsSaveController');
Route::get('/admin/answer', 'Admin\\AnswerController@index');

Route::get('/','User\\UserViewController@index')->name('home');

Route::get('/index/{lang?}','User\\UserViewController@index')->name('index');
Route::get('/news/{lang?}','User\\UserViewController@news')->name('news');
Route::get('/programme/{lang?}','User\\UserViewController@programme')->name('programme');
Route::get('/photosession/{lang?}','User\\UserViewController@photosession')->name('photosession');
Route::get('/gallery_more/{id}/{lang?}','User\\UserViewController@gallery_more')->name('gallerymore');
Route::get('/contact/{lang?}','User\\UserViewController@contact')->name('contact');
Route::get('/about_us/{lang?}','User\\UserViewController@about_us')->name('about_us');
Route::get('/work/{lang?}','User\\UserViewController@work')->name('work');
Route::get('/schedule/{lang?}','User\\UserViewController@episode')->name('schedule');
Route::get('/schedule_day/{date}/{lang?}','User\\UserViewController@episode_days')->name('schedule_day');
Route::get('/episods_view/{id}/{lang?}','User\\UserViewController@episods_view')->name('episods_view');
Route::get('/anons_view/{id}/{lang?}','User\\UserViewController@anons_view')->name('eanons_view');
Route::get('/archive_view/{id}/{lang?}','User\\UserViewController@archive_view')->name('archive_view');
Route::get('/program_more/{programm_id}/{id?}/{lang?}','User\\UserViewController@program_more')->name('program_more');
Route::get('/anons_more/{programm_id}/{id?}/{lang?}','User\\UserViewController@anons_more')->name('anons_more');
Route::get('/archive_more/{programm_id}/{id?}/{lang?}','User\\UserViewController@archive_more')->name('archive_more');
Route::get('/archive/{lang?}','User\\UserViewController@archive')->name('archive');
Route::get('/news_more/{id}/{lang?}','User\\UserViewController@news_more')->name('news_more');
Route::post('/archive/{lang?}','User\\UserViewController@archive_search')->name('archive_search');
Route::post('admin/questions/active/{id}/{text?}', 'Admin\\QuestionsController@activate');
Route::post('/send_email', 'User\\UserViewController@sendEmail');
Route::post('/text_answer', 'User\\AnswerController@TextAnswer');
Route::post('/yes_or_no', 'User\\AnswerController@yesOrNo');
Route::post('/polls_answer', 'User\\AnswerController@pollsAnswer');
Route::get('/search_schedule/{program}/{id?}/{lang?}', 'User\\UserViewController@search_schedule')->name('search_schedule');

Route::post('/search/news', 'User\\SearchController@news');
Route::post('/search/programme', 'User\\SearchController@programme');
Route::post('/search/photosession', 'User\\SearchController@photosession');
Route::post('/search/dashboard', 'User\\SearchController@dashboard');
Route::post('/search/schedule', 'User\\SearchController@schedule');
Route::post('/search/archiv', 'User\\SearchController@archiv_search_name');
Route::post('/admin/episodes/send_archive/{id}', 'Admin\\EpisodesController@send_archive');
Route::post('/admin/archive/send_archive/{id}', 'Admin\\ArchiveController@send_archive');
