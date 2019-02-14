<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
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
        $categories=\App\Categorie::all();
        $posts=\App\Post::all();
        return view('/admin',compact('categories', 'posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/categories/createCategories');
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
            'categorie' => 'required|unique:categories|max:255',
        ]);

        $categorie = new \App\Categorie;
        $categorie->categorie = $request->get('categorie');
        $categorie->save();
        return redirect('blog/admin')->with('success', 'Data kategori telah ditambahkan'); 
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
        $post = \App\Categorie::find($id);
        $post->delete();
        return redirect('blog/admin')->with('success','Data kategori telah di hapus');
    }
}
