<?php

Route::group(['prefix' => 'admin', 'middleware' => 'role:Admin|Editor'], function () {

    Route::get('/', 'DashboardController@index');
    Route::get('/get-message', 'DashboardController@get_message');
    Route::get('/get-message/{id}', 'DashboardController@get_message_id');
    Route::get('/my-profile', 'AdminController@show');

    Route::resource('messages', 'ContactsController');
    Route::get('/messages/{message}/read', 'ContactsController@read');
    Route::get('/newsletter', 'NewsletterController@index');
    Route::get('/newsletter/{id}/destroy', 'NewsletterController@destroy');


    Route::resource('admins', 'AdminController');
    Route::post('/admins/destroy/all', 'AdminController@delete_admin_all');
    Route::post('/admins/add-role', 'AdminController@add_role');

    Route::resource('/teachers', 'TeacherController');
    Route::resource('/students', 'StudentController');

    Route::get('/settings', 'SettingsController@index');
    Route::post('/settings/update', 'SettingsController@update');

    Route::get('/social-medias', 'SettingsController@socialMedia');
    Route::post('/settings/social-media', 'SettingsController@socialMedia_store');
    Route::get('/settings/social-media/{id}/edit', 'SettingsController@socialMedia_edit');
    Route::post('/settings/social-media/update', 'SettingsController@socialMedia_update');
    Route::get('/settings/social-media/{id}/destroy', 'SettingsController@socialMedia_destroy');

    Route::get('/settings/why-choose', 'SettingsController@why_choose');
    Route::get('/settings/why-choose/create', 'SettingsController@why_choose_create');
    Route::post('/settings/why-choose/store', 'SettingsController@why_choose_store');
    Route::get('/settings/why-choose/{id}/edit', 'SettingsController@why_choose_edit');
    Route::post('/settings/why-choose/update', 'SettingsController@why_choose_update');
    Route::get('/settings/why-choose/{id}/destroy', 'SettingsController@why_choose_destroy');

    Route::get('/settings/our-founders', 'SettingsController@our_founders');
    Route::get('/settings/our-founders/create', 'SettingsController@our_founders_create');
    Route::post('/settings/our-founders/store', 'SettingsController@our_founders_store');
    Route::get('/settings/our-founders/{id}/edit', 'SettingsController@our_founders_edit');
    Route::post('/settings/our-founders/update', 'SettingsController@our_founders_update');
    Route::get('/settings/our-founders/{id}/destroy', 'SettingsController@our_founders_destroy');

    Route::resource('/blog/categories', 'CategoryController');
    Route::resource('/blog/posts', 'PostController');

    Route::post('/blog/comment/{id}/destroy', 'PostController@comment_destroy');

    Route::resource('/faqs', 'FaqController@index');

    Route::resource('/media-galleries', 'MediaGalleryController');

    Route::resource('/courses-categories', 'CourseCategoryController');
    Route::resource('courses', 'CoursesController');
    Route::put('courses/{course}/approve', 'CoursesController@approve');

    Route::resource('/coupons', 'CouponController');
    Route::get('/coupon/{coupon}/approve', 'CouponController@approve');

    Route::get('/files', 'CourseFilesController@add_course_files');
    Route::post('/files', 'CourseFilesController@store_course_files');
    Route::get('/files/{id}/delete', 'CourseFilesController@file_delete');

});
