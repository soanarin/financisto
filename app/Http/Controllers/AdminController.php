<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class AdminController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }
    //
    public function edit_categories(){
    	$categories=Category::all();
    	return view('admin.categories',array('categories'=>$categories));
    }

    public function delete_categories(Request $request,$id){
    	$category=Category::find($id);
    	$category->delete();
    	return redirect('/admin/categories');
    }

    public function post_categories(Request $request){
        $category=new Category;
        $category->category=$request->category;
    	$category->save();
    	return redirect('/admin/categories');
    }

    public function put_categories(Request $request,$id){
    	$category=Category::find($id);
    	return redirect('/admin/categories');
    }



}
