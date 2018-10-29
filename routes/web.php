<?php

Auth::routes();

Route::group(['middleware' => 'guest'], function () {
    Route::get('login/{provider}', 'ProviderSocialiteController@redirectToProvider');
    Route::get('login/{provider}/callback', 'ProviderSocialiteController@handleProviderCallback');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/', 'IndexController@index');

Route::get('contacts', 'IndexController@contacts');
Route::post('contacts', 'IndexController@contacts_store');

Route::get('about', 'IndexController@about');
Route::get('help', 'IndexController@help');
Route::get('faqs', 'IndexController@faqs');
Route::get('media-gallery', 'IndexController@media_gallery');
Route::post('/newsletter_form', 'IndexController@newsletter_form');
Route::post('/searsh', 'IndexController@searsh');

Route::get('blog', 'IndexController@blog');
Route::get('blog/blog-post/{id}', 'IndexController@blog_post');
Route::get('blog/category/{id}', 'IndexController@filter_catecory');
Route::post('blog/comment-store', 'IndexController@blog_comments_store');
Route::post('blog/search', 'IndexController@search');

Route::get('category/{courses_category}', 'IndexController@searsh_category');
Route::get('courses-grid', 'IndexController@all_courses');
Route::get('courses-list', 'IndexController@all_courses_list');
Route::get('course-details/{course_title}', 'IndexController@course_details');

Route::post('/teacher-detail/{name}', 'IndexController@teacher_detail');

Route::get('shopping-cart', 'CartController@getCart');
Route::get('add-to-cart/{id}', 'CartController@getAddToCart');
Route::get('checkout', 'CartController@getCheckout');
Route::post('checkout', 'CartController@postCheckout');
Route::any('reduce/{id}', 'CartController@getReduceByOne');
Route::any('remove/{id}', 'CartController@getRemoveItem');
Route::post('/getAddToCoupon', 'CartController@getAddToCoupon');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/course/comment-store', 'IndexController@course_comments_store');
});

Route::group(['middleware' => 'roles:Student'], function () {
    Route::get('/profile/{name?}', 'ProfileStudentController@profile');
    Route::post('/profile/{id}/update', 'ProfileStudentController@update_profile');
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/my-course', 'ProfileStudentController@my_courses');
    });
});

Route::group(['middleware' => 'role:Teacher'], function () {
    Route::get('/my-profile/{name}', 'ProfileTeacherController@profile');
    Route::post('/profile/update', 'ProfileTeacherController@update_profile');

    Route::group(['prefix' => 'dashboard'], function () {

        Route::get('/', 'CoursesTeacherController@dashboard');

        Route::resource('courses', 'CoursesTeacherController');

        Route::resource('comments', 'CommentsController');
        Route::post('comments/{comment}/read', 'CommentsController@read');

        Route::resource('/coupons', 'CouponController');

        Route::get('/my-courses', 'ProfileTeacherController@my_courses');

        Route::get('/files', 'CoursesTeacherController@add_course_files');
        Route::post('/files', 'CoursesTeacherController@store_course_files');
        Route::get('/files/{id}/delete', 'CoursesTeacherController@file_delete');
    });
});