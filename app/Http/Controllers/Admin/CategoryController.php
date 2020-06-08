<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Category;

class CategoryController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
     {
        $categories = Category::all();
         return view('category.index', compact('categories'));
     }

     public function create()
     {
     	return view('category.create');
     }

     public function store(Request $request)
     {
        $data = $request->validate([
          'name' => 'required|min:2'
        ]); 
        $category = new Category;
        $category->name = $request->name;
        if ($category->save())
          return redirect()->route('categories.index')->with('success','Category Succesfully Created');
        else
            return back()->with('error','Category not created');

     }

}
