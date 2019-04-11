<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recentPost = DB::select('SELECT posts.id, posts.title, posts.uploadedBy, posts.created_at FROM posts ORDER BY posts.created_at DESC LIMIT 10');
        $recentComment = DB::select('SELECT (SELECT users.name FROM users WHERE users.id = comments.fromUser) as fromUser, (SELECT posts.title FROM posts WHERE posts.id = comments.onPost) as onPost, comments.created_at FROM comments ORDER BY comments.created_at DESC LIMIT 10');

        return view('v2/blog/admin/activity/activity', compact('recentPost', 'recentComment'));
    }

}
