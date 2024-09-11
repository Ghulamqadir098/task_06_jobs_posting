@extends('layout.layout')


@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">Category Form</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('category.create')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Name*</label>
                                <input type="text" class="form-control" id="email" name="name" required autofocus>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    
@endsection