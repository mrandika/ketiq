<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=\App\Post::all();
        return view('/admin',compact('posts'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
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
            'featuredImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'categories' => 'required',
            'author' => 'required',
        ]);

        $post = new \App\Post;
        $post->hasFeatured = $request->get('didIHavefeaturedImage');

        if($request->hasFile('featuredImage')){
            $cover = $request->file('featuredImage');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

            $post->mime = $cover->getClientMimeType();
            $post->original_filename = $cover->getClientOriginalName();
            $post->featuredImage = $cover->getFilename().'.'.$extension;
        }

        $post->categoriesId = $request->get('categories');
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->uploadedBy = $request->get('author');
        $post->save();
        
        return redirect('/posts')->with('success', 'Data post telah ditambahkan'); 
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
        $post = \App\Post::find($id);
        return view('show',compact('post','id'));
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
        $post = \App\Post::find($id);
        return view('edit',compact('post','id'));  
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
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);

        $post= \App\Post::find($id);
        $post->hasFeatured = $request->get('didIHavefeaturedImage');

        if($request->hasFile('featuredImage')){
            $cover = $request->file('featuredImage');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

            $post->mime = $cover->getClientMimeType();
            $post->original_filename = $cover->getClientOriginalName();
            $post->featuredImage = $cover->getFilename().'.'.$extension;
        }

        $post->categoriesId = $request->get('categories');
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->uploadedBy = $request->get('author');
        $post->save();
        return redirect('/posts')->with('success', 'Data post telah diubah');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = \App\Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success','Data post telah di hapus');
    }
}
