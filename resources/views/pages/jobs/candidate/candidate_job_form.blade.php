@extends('layout.layout')


@section('content')
<div class="container">
 <div class="row bg-danger">
<div class="col-6 p-2 bg-info">
  Title:{{$job->title}}
</div>    
<div class="col-6 p-2 bg-danger">
    Company:{{$job->company_name}}  
  </div>
</div>

<div class="row">
    <div class="col-10 p-2 bg-success bg-opacity-50">
      Description:{{$job->description}}  
    </div>
    <div class="col-2 p-2 bg-warning bg-opacity-50">
        Salary:{{$job->salary_range}}  
      </div>    
    </div>


    <form method="POST" action="{{route('candidate.job.confirmed',$job->id)}}">
     @csrf
     <input type="submit" value="Confirm">
    </form>
</div>    



@endsection