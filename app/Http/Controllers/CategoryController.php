<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_form(){

  return view('pages.categories.create_category');
    }

    public function category_create(Request $request){

   $request->validate([
   'name' =>'required|string',
   ]);

   $category = new Category;
   $category->name = $request->name;
   $category->save();

   return back();
    }

    public function index(){

      return view('pages.categories.view_category');


    }
    public function category_view(Request $request){

      if ($request->ajax()) {

        $categories = Category::select(['id', 'name', 'created_at', 'updated_at']);
        return DataTables::of($categories)
            ->addColumn('action', function($row){
                return '<a href="/categories/edit/'.$row->id.'" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->make(true);
    }
      

    }
}
