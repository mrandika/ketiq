<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'onPost' => 'required|max:10',
            'fromUser' => 'required|max:10',
            'comment' => 'required',
        ]);
        $comment = new Comment;
        $comment->onPost = $request->get('onPost');
        $comment->fromUser = $request->get('fromUser');
        $comment->comment = $request->get('comment');

        $comment->save();
        return redirect($request->server('HTTP_REFERER'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        $comment = Comment::find($id);
        $comment->hasEdited = "YES";
        $comment->comment = $request->get('editComment');

        $comment->save();
        return redirect($request->server('HTTP_REFERER'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $comment = Comment::find($id);
        $comment->delete();
        return redirect($request->server('HTTP_REFERER'));
    }
}
