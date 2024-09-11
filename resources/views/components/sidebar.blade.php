<div class="sidebar">
    <nav class="nav-menu">
        <ul>
            <li><a href="#">Home</a></li>


@if (Auth::user()->roles->contains('name','super_admin'))
    
       
<li class="dropdown">
    <a href="#">Category</a>
    <ul class="dropdown-menu">
        <li><a href="{{route('category.form')}}">Create Category</a></li>
        <li><a href="{{route('category.index')}}">View Category</a></li>

    </ul>
</li>
@endif   

@if (Auth::user()->roles->contains('name', 'employer') || Auth::user()->roles->contains('name', 'super_admin'))

<li><a href="#">Create Job</a></li>

@endif   

            <li><a href="{{route('logout')}}">Logout</a></li>
        </ul>
    </nav>
</div>