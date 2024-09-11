@extends('layout.layout')

@section('content')
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Edit</div>
                <div class="card-body">
                    <form method="POST" action="{{route('category.update',$category->id)}}">
                      @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Edit Name*</label>
                            <input type="text" class="form-control" id="name" value="{{$category->name}}" name="name" required autofocus>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection