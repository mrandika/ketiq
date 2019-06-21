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
    $posts = App\Post::paginate(8);
    $categories = App\Category::get();
    return view('v2/blog/homepage/home', ['posts' => $posts], ['categories' => $categories]);
})->name('blog.home');

Route::get('blog/filter/{id}', function($id) {
    $posts = App\Post::where('categoriesId', $id)->get();
    $categories = App\Category::get();
    return view('v2/blog/homepage/filteredPost', ['posts' => $posts], ['categories' => $categories]);
});

Auth::routes();

Route::resource('blog/admin', 'PostController');
Route::resource('blog/admin/panel/categories', 'CategoryController');
Route::resource('blog/admin/panel/comment', 'CommentController');
Route::resource('blog/admin/panel/membership', 'MembershipController');
Route::resource('blog/admin/panel/activity', 'ActivityController');
Route::resource('blog/admin/panel/media', 'MediaController');

Route::get('/home', 'HomeController@index')->name('home');
