<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function job_form(){
   $categories = Category::all();

     return view('pages.jobs.job_create_form',compact('categories'));
    }

    public function job_create(Request $request){

$user_id= Auth::user()->id;

   // Validation here
   $request->validate([
        'title' =>'required|min:3',
        'description' =>'required|min:10',
        'company_name' =>'required',
        'salary_range' =>'required',
        'office_location'=>'required',
        'category_id'=>'required',
    ]);

   // Save to the database
   $job = new Job();
   $job->title = $request->title;
   $job->description = $request->description;
   $job->company_name = $request->company_name;
   $job->salary_range = $request->salary_range;
   $job->office_location = $request->office_location;
   $job->category_id = $request->category_id;
   $job->employer_id= $user_id;
   $job->save();

   return redirect()->route('job.index');
    }


    public function index(){

return view('pages.jobs.employer_view_jobs');
    }
    public function job_view(Request $request){
        if ($request->ajax()) {
            $jobs = Job::select(['id', 'title', 'company_name', 'salary_range'])->where('employer_id', Auth::id());
            return DataTables::of($jobs)
            ->addColumn('action', function($row){
              $editUrl = route('job.edit', $row->id);
              $deleteUrl = route('category.delete', $row->id);
    
              return '
              <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
              <button class="btn btn-sm btn-danger delete-job" data-id="'.$row->id.'">Del</button>';
          })
          ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function job_edit($id){

   $job = Job::find($id);
   $categories= Category::all();

   return view('pages.jobs.employer_edit_form',compact('job','categories'));
    }

    public function job_update(Request $request, $id){

   // Validation here
   $request->validate([
        'title' =>'required|min:3',
        'description' =>'required|min:10',
        'company_name' =>'required',
        'salary_range' =>'required',
        'office_location'=>'required',
        'category_id'=>'required',
    ]);
   // Update to the database
   $job = Job::find($id);
   $job->title = $request->title;
   $job->description = $request->description;
   $job->company_name = $request->company_name;
   $job->salary_range = $request->salary_range;
   $job->office_location = $request->office_location;
   $job->category_id = $request->category_id;
   $job->save();
   return redirect()->route('job.index');
    }

    public function job_delete($id){

   $job = Job::find($id);
   $job->delete();
   return response()->json(['success' => 'Job deleted successfully']);
}
}
