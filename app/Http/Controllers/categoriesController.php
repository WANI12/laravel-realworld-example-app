<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
class categoriesController extends Controller
{
    public function category()
    {
        $category = Category::all();
        return view('categories.categories',['category'=>$category]);
    }
    public function addCategory(Request $request){
        $this->validate($request,[
            'category'=>'required'
        ]);
        $category= new Category;
        $category->category=$request->input('category');
        $category->save();
        return redirect('/category')->with('response','Category added successffully');
    }
}
