@extends('layout.layout')


@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">Category Form</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('job.create')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="title" name="title" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Description*</label>
                                <input type="text" class="form-control" id="description" name="description" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Company Name*</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Office Location*</label>
                                <input type="text" class="form-control" id="office_location" name="office_location" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Salary Range*</label>
                                <input type="text" class="form-control" id="salary_range" name="salary_range" required autofocus>
                            </div>
                            
                 
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Select Category</label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    
@endsection