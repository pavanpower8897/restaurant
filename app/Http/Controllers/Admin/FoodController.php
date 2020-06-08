<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Food;
use App\Category;

class FoodController extends Controller
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
    	$foods = DB::table('food')
    	            ->join('categories', 'food.category_id','categories.id')
    	            ->select('food.*','categories.name as category_name')
    	            ->paginate(3);
         return view('food.index', compact('foods'));
    }

    public function create()
    {
    	$categories = Category::all();
        return view('food.create',compact('categories'));	
    }

    public function store(Request $request)
    {
       $food = $this->valdata($request);
        if( Food::create($food))
             return redirect()->route('foods.index')->with('success','Food Item Succesfully Created');
        else
            return back()->with('error','Food Item not created');

    }

    public function edit($id)
    {
    	$food = Food::find($id);
    	$categories = Category::all();
       return view('food.edit', compact('food', 'categories'));
    }
    public function update(Request $request, $id)
    { 
    	  $food = $this->valdata($request);

    	  if( Food::find($id)->update($food))
    	  	 return redirect()->route('foods.index')->with('success','Food Item Succesfully Updated');
        else
            return back()->with('error','Food Item not updated');

       
    }

    public function destroy($id)
    {
    	Food::find($id)->delete();
        return  redirect()->back()->with('error','Food Item not updated');

    }

    private function valdata($request)
    {
    	$data = $request->validate([
    		'name' => 'required',
    		'description' => 'required',
    		'price' => 'required',
    		'category_id' => 'required|not_in:0'
    	]);
        $food = [];
        $food['name'] = $request->name;
        $food['description'] = $request->description;
        $food['price'] = $request->price;
        $food['category_id'] = $request->category_id;
        return $food;
    }
    
    }
