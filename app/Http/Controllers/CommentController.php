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
        $comment->onPost = $request->post('onPost');
        $comment->fromUser = $request->post('fromUser');
        $comment->comment = $request->post('comment');

        $comment->save();
        return redirect($request->server('HTTP_REFERER'));
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
            'editComment' => 'required',
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
