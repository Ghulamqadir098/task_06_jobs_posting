<?php

namespace App\Http\Controllers;
use App\Models\Job;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function total_jobs_index()
    {


        return view('pages.jobs.candidate.candidate_jobs_view');
    }
    public function total_jobs_view(Request $request)
    {

        if ($request->ajax()) {
            $jobs = Job::with('employer')->get();
            return DataTables::of($jobs)
            ->addColumn('action', function($row){
                $applyUrl = route('candidate.jobs.apply', $row->id);
                $user = Auth::user(); // Assume this is the candidate
                // dd($user); // Assume this is the candidate
                 if($user->appliedJobs()->where('job_id', $row->id)->exists()){
                    return '
                    <a href="" class="btn btn-sm btn-success">Already Applied</a>
                   ';

                 }
                 else{
                    return '
                    <a href="'.$applyUrl.'" class="btn btn-sm btn-primary">Apply</a>
                   ';
                 }

            })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function job_form($id){
   $job=Job::find($id);
return view('pages.jobs.candidate.candidate_job_form',compact('job'));
    }


    public function job_confirmed($id){

        $user = Auth::user(); // Assume this is the candidate
        $job = Job::find($id); // Find the job by ID

        if ($job) {

     // Check if the user has already applied to the job
     if ($user->appliedJobs()->where('job_id', $job->id)->exists()) {
      
        session()->flash('message', 'Already applied on this job!');
        return redirect()->back();
    }

        $user->appliedJobs()->attach($job->id); // Attach job to the user
        } else {
            return back()->with('error', 'Job not found.');
        }

        session()->flash('message', 'Job Applied, wait for reply from the team!');
        return redirect()->route('candidate.jobs.index');

    }
}
