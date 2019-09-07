<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use DB;

class CategoryController extends Controller
{
    public function createCategory(){
    	return view('admin.category.addCategory');
    }
    public function storeCategory(Request $request){
    	//  validation process
    	 $this->validate($request, [
            'categoryName' => 'required|unique:categories|max:255',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
    	// return $request->all();
/*  waye 1
  	$category = new category();
    	$category->categoryName = $request->categoryName;
    	$category->categoryDescription = $request->categoryDescription;
    	$category->publicationStatus = $request->publicationStatus;
    	$category->save();
    	return 'category insert success fully';*/


    	//  waye 2 but model a protected $fillable =['field gulo dia dite hobe']
    /*	Category::create($request->all());
    	return 'category insert success fully';*/

    	//ai duto podhoti Eloquent ORM class er
     

    //quiery Builder
    DB::table('categories')->insert([
    	'categoryName' => $request->categoryName,
    	'categoryDescription' => $request->categoryDescription,
    	'publicationStatus' => $request->publicationStatus,
    
    ]);
    // return redirect()->back();
    return redirect('/category/add')->with('message','Category Add Succesfully');
}

// https://github.com/proengsoft/laravel-jsvalidation/wiki/Controller-Validation-Example
//https://scotch.io/tutorials?q=&page=0&dFR%5B_tags%5D%5B0%5D=laravel&fR%5Bauthor.verified%5D%5B0%5D=1&fR%5Bis_spam%5D%5B0%5D=0&fR%5Bstatus%5D%5B0%5D=published&hFR%5Bcategory%5D%5B0%5D=Tutorials&is_v=1



	public function manageCategory(){
		$categories = Category::all();
		return view('admin.category.manageCategory',['category'=>$categories]);
	}

	public function editCategory($id){
		//return $id;
		$categoryById = Category::where('id',$id)->first();
		return view('admin.category.editCategory',['categoryById'=>$categoryById]);
		
	}
	public function updatetCategory(Request $request){
		//dd($request->all());
		$category = Category::find($request->categoryId);
		$category->categoryName = $request->categoryName;
    	$category->categoryDescription = $request->categoryDescription;
    	$category->publicationStatus = $request->publicationStatus;
    	$category->save();
		return redirect('/category/manage')->with('message','Category update Succesfully');
	}

        public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publicationStatus = 0;
        $category->save();
        return redirect('/category/manage')->with('message','Category Unpublished Succesfully');
    }

        public function publishedCategory($id){
        $category = Category::find($id);
        $category->publicationStatus = 1;
        $category->save();
        return redirect('/category/manage')->with('message','Category Published Succesfully');

    }

		public function deleteCategory($id){
		$category = Category::find($id);
    	$category->delete();
		return redirect('/category/manage')->with('message','Category delete Succesfully');

	}




}
