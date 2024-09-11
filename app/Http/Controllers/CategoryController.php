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
          $editUrl = route('category.edit', $row->id);
          $deleteUrl = route('category.delete', $row->id);

          return '
          <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
          <button class="btn btn-sm btn-danger delete-category" data-id="'.$row->id.'">Del</button>';
      })
      ->rawColumns(['action'])
            ->make(true);
    }
    }
    public function category_edit($id){
   $category = Category::find($id);

   return view('pages.categories.edit_category', compact('category'));

    }

    public function category_update(Request $request, $id){

   $request->validate([
      'name' =>'required|string',
   ]);
   
   
   $category = Category::find($id);
   $category->name = $request->name;
   $category->save();

   return redirect()->route('category.index');
  }

  public function category_delete($id){

  $category = Category::find($id);
  $category->delete();
  return response()->json(['success' => 'Category deleted successfully']);
  }
}
