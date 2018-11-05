<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories=category::all();
        return view('admin.category.viewCategory')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category'=>'required|unique:categories,cat_name',
            'rank'=>'required|numeric'
        ]);

        $category=new category;
        $category->cat_name=$request->input('category');
        $category->cat_rank=$request->input('rank');
        $category->save();

        session()->flash('success','category Created');

        return view('admin.category.addCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $category= category::find($category)->first();
        return view('admin.category.editCategory')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $this->validate($request,[
            'category'=>'required',
            'rank'=>'required|numeric'
        ]);

        $category=category::find($category)->first();
        $category->cat_name=$request->input('category');
        $category->cat_rank=$request->input('rank');
        $category->save();

        session()->flash('success','category Updated');

        return view('admin.category.addCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        category::where('id',$category)->delete();
        
        $categories=category::all();

        session()->flash('success','category Removed');

        return view('admin.category.viewCategory')->with('categories',$categories);
    }
}
