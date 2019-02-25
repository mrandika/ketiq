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

Route::get('/', function () {
    return view('home');
});

Route::get('profile', function () {
    return view('profile');
});

Route::get('portofolio', function () {
    return view('portofolio');
});

Route::get('blog', function () {
    $posts = DB::table('posts')->get();
    $categories = DB::table('categories')->get();
    return view('blog', ['posts' => $posts], ['categories' => $categories]);
});

Route::get('blog/filter/{id}', function($id) {
    $filteredPosts = DB::table('posts')->where('categoriesId', $id)->get();
    $posts = DB::table('posts')->get();
    return view('filteredBlog', ['filteredPosts' => $filteredPosts], ['posts' => $posts]);
});

Auth::routes();

Route::resource('blog/admin', 'PostController');
Route::resource('blog/admin/comment', 'CommentController');
Route::resource('blog/admin/categories', 'CategorieController');
Route::resource('blog/admin/membership', 'MembershipController');

Route::get('/home', 'HomeController@index')->name('home');
