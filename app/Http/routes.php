<?php

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
|
|
|
|
|
*/

Route::get('/blog', 'BlogController@index');

Route::get('/blog/{slug}', 'BlogController@getPost');

Route::get('/blog/next/{post}', 'BlogController@next');

Route::get('/blog/prev/{post}', 'BlogController@prev');

Route::get('/blog/category/{cat}', 'BlogController@getCategory');

Route::get('/post', function () {
    return view('blog.post');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
|
|
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', function () {
        return view('admin.layout');
    });

    Route::get('/admin/add_post', 'PostController@addPost');

    Route::get('/admin/all_posts', 'PostController@index');

    Route::get('/admin/edit_post/{post}', 'PostController@edit');

    Route::post('/admin/add_post', 'PostController@save');

    Route::patch('/admin/edit_post', 'PostController@patch');

    Route::delete('/admin/edit_post', 'PostController@destroy');

});


Route::get('/home', 'HomeController@index');

Route::get('/projects', function() {
  return view('projects.project_index');
});

Route::get('/bugwild', function() {
  return view('projects.bugwild');
});

Route::get('/bnb', function() {
  return view('projects.bnb');
});

Route::get('/google4ff0739b039c1218.html', function () {
    return view('google');
});

Route::auth();

Route::get('/', function () {
    $posts = DB::table('posts')->orderBy('id', 'DESC')->take(5)->get();
    return view('index', compact('posts'));
});
