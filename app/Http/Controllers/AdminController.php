<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;

use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function total_jobs_index(){

return view('pages.jobs.admin.admin_jobs_view');
    }


    public function total_jobs_view(Request $request){

        if ($request->ajax()) {
            $jobs = Job::with('employer')->get();
            return DataTables::of($jobs)
            ->addColumn('employer', function($row){
                $employerName = $row->employer ? $row->employer->name : 'Unknown Employer';
                return '
                <span>' . $employerName . '</span>
            ';
          })
          ->rawColumns(['employer'])
                ->make(true);
        }
    }

    public function total_employers_index(){

return view('pages.jobs.admin.admin_employers_view');
    }

    public function total_employ_view(Request $request){
  
        if ($request->ajax()) {
            $jobs = Job::with('employer')->get();
            return DataTables::of($jobs)
            ->addColumn('name', function($row){ 
                $employerName = $row->employer ? $row->employer->name : 'Unknown Employer';
                return '
                <span>' . $employerName . '</span>
            ';
          })
          ->addColumn('company_name', function($row){
            $company_name = $row->employer ? $row->employer->company_name : 'Unknown Company';
            return '
            <span>' . $company_name . '</span>
        ';
      })
      ->addColumn('email', function($row){
        $email = $row->employer ? $row->employer->email : 'Unknown email';
        return '
        <span>' . $email . '</span>
    ';
  })

          ->rawColumns(['name','company_name','email'])
                ->make(true);
        }

    }

    }


