<div class="sidebar">
    <nav class="nav-menu">
        <ul>
            <li><a href="#">Home</a></li>


{{-- @if (Auth::user()->roles->contains('name','admin')) --}}
    
       
<li class="dropdown">
    <a href="#">Task</a>
    <ul class="dropdown-menu">
        <li><a href="#">Create Task</a></li>
    </ul>
</li>
{{-- @endif    --}}

            <li><a href="{{route('logout')}}">Logout</a></li>
        </ul>
    </nav>
</div>