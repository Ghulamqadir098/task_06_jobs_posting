<div class="sidebar">
    <nav class="nav-menu">
        <ul>
            <li class="bg-success fw-bold text-center p-2">{{Auth::user()->name}}</li>


@if (Auth::user()->roles->contains('name','super_admin'))
    
       
<li class="dropdown">
    <a href="#">Category</a>
    <ul class="dropdown-menu">
        <li><a href="{{route('category.form')}}">Create Category</a></li>
        <li><a href="{{route('category.index')}}">View Category</a></li>

    </ul>
</li>

<li><a href="{{route('total.jobs.index')}}">View all Jobs</a></li>
<li><a href="{{route('total.employers.index')}}">View all Employers</a></li>

@endif   

@if (Auth::user()->roles->contains('name', 'employer'))

<li><a href="{{route('job.form')}}">Create Job</a></li>
<li><a href="{{route('job.index')}}">My posted Jobs</a></li>

@endif  

@if (Auth::user()->roles->contains('name','candidate'))

<li><a href="{{route('candidate.jobs.index')}}">Jobs Listings</a></li>
    
@endif

            <li><a href="{{route('logout')}}">Logout</a></li>
        </ul>
    </nav>
</div>