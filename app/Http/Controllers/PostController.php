<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage, File;
use Redirect, Response;

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
        $categories=\App\Categorie::all();
        return view('v2/blog/admin/post/post',compact('posts', 'categories'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=\App\Categorie::all();
        return view('v2/blog/admin/post/create', compact('categories'));
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

        $post->tags = $request->get('tags');
        $post->categoriesId = $request->get('categories');
        $post->title = $request->get('title');
        $post->headline = $request->get('headline');
        $post->content = $request->get('content');
        $post->uploadedBy = $request->get('author');
        $post->save();
        
        return redirect('blog/admin')->with('success', 'Data post telah ditambahkan'); 
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
        $posts = \App\Post::all();
        $comments = \App\Comment::all()->where('onPost', $id);
        return view('show',compact('post','posts','comments'));
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
        $user = \App\User::find($id);
        $categories = \App\Categorie::all();
        return view('v2/blog/admin/post/edit',compact('post', 'user', 'categories'));  
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
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = \App\Post::find($id);
        $post->hasFeatured = $request->get('didIHavefeaturedImage');

        if($request->hasFile('featuredImage')){
            Storage::disk('public')->delete($post->featuredImage);

            $cover = $request->file('featuredImage');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

            $post->mime = $cover->getClientMimeType();
            $post->original_filename = $cover->getClientOriginalName();
            $post->featuredImage = $cover->getFilename().'.'.$extension;
        }

        $post->categoriesId = $request->get('categories');
        $post->tags = $request->get('tags');
        $post->title = $request->get('title');
        $post->headline = $request->get('headline');
        $post->content = $request->get('content');
        $post->uploadedBy = $request->get('author');
        $post->save();
        return redirect('blog/admin')->with('success', 'Data post telah diubah');    
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
        if ($post->featuredImage != null) {
            Storage::disk('public')->delete($post->featuredImage);
        }
        $post->delete();
        return Response::json($post);
    }
}
