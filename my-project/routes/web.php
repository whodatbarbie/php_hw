<?php

use Illuminate\Support\Facades\Route;
use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Http\Request;

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
    $posts = Posts::all();
    return view('welcome', ['posts'=>$posts]);
});

Route::get('/single-post/{id}', function ($id) {
    $post = Posts::where('id', $id)->get();
    $first = $post->first();
    $comments = Comments::where('post_id', $id)->orderBy('created_at', 'desc')->get();
    return view('single-post', ['post'=>$first, 'comments'=>$comments]);
});

Route::post('/comments/{id}', function (Request $request, $id) {
    $comment = new Comments;
    $comment->name = $request->input('name');
    $comment->comment = $request->input('comment');
    $comment->post_id = $id;
    $comment->save();

    $post = Posts::where('id', $id)->get();
    $first = $post->first();
    $comments = Comments::where('post_id', $id)->orderBy('created_at', 'desc')->get();
    return view('single-post', ['post'=>$first, 'comments'=>$comments]);
  });



  Route::get('/admin', function () {
    $posts = Posts::all();
    return view('admin', ['posts'=>$posts]);
});

Route::get('/comments/{id}', function ($id) {
    $comments = Comments::where('post_id', $id)->orderBy('created_at', 'desc')->get();
    return view('comments', ['comments'=>$comments]);
});

Route::get('/delete-comment/{id}', function ($id) {
    $comment = Comments::find($id);
    $comment->delete();
    return redirect('/admin');
});

Route::get('/add', function () {
    return view('add-post');
});


Route::post('/add-post', function (Request $request) {
    $post = new Posts;
    $post->title = $request->input('title');
    $post->post = $request->input('body');
    $post->save();
    return redirect('/admin');
  });
