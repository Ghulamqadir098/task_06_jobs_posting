<?php

namespace App\Http\Controllers;
use App\Models\Job;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
            $jobs = User::whereNotNull('company_name')->get();
            return DataTables::of($jobs)
            ->addColumn('name', function($row){ 
                $employerName = $row ? $row->name : 'Unknown Employer';
                return '
                <span>' . $employerName . '</span>
            ';
          })
          ->addColumn('company_name', function($row){
            $company_name = $row ? $row->company_name : 'Unknown Company';
            return '
            <span>' . $company_name . '</span>
        ';
      })
      ->addColumn('email', function($row){
        $email = $row ? $row->email : 'Unknown email';
        return '
        <span>' . $email . '</span>
    ';
  })

          ->rawColumns(['name','company_name','email'])
                ->make(true);
        }

    }

    }


