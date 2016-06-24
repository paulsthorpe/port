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

Route::get('/', function () {
    $posts = DB::table('posts')->orderBy('id','DESC')->take(5)->get();
    return view('index', compact('posts'));
});

Route::get('/blog', 'PostController@index');

Route::get('/blog/{slug}', 'PostController@getPost');

Route::get('/blog/next/{post}', 'PostController@next');

Route::get('/blog/prev/{post}', 'PostController@prev');

Route::get('/blog/category/{cat}', 'PostController@getCategory');

Route::get('/post', function () {
    return view('blog.post');
});



Route::auth();

Route::group(['middleware' => 'auth'], function(){

// Route::get('profile', ['middleware' => 'auth', function() {
  Route::get('/admin', function () {
      return view('admin.layout');
  });

  Route::get('/admin/add_post', function () {
      $categories = App\Category::all();
      return view('admin.add_post', compact('categories'));
  });

  Route::post('/admin/add_post', 'PostController@store');

  Route::get('/admin/all_posts', function () {
      $posts = App\Post::orderBy('updated_at','DESC')->get();
      return view('admin.all_posts', compact('posts'));
  });

});

Route::get('/home', 'HomeController@index');
