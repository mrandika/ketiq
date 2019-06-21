<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect, Response;

use App\Category;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('v2/blog/admin/categories/categories', compact('categories'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('v2/blog/admin/categories/create');
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
            'title' => 'required|unique:categories|max:255',
        ]);

        $categorie = new Category;
        $categorie->title = $request->get('title');
        $categorie->save();
        return redirect('blog/admin/panel/categories')->with('success', 'Data kategori telah ditambahkan'); 
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
        $categorie = Categorie::find($id);
        $categorie->delete();
        return Response::json($categorie);
    }
}
