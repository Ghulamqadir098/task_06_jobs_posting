@extends('layout.layout')


@section('content')
    
<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">Edit</div>
            <div class="card-body">
                <form method="POST" action="{{route('job.update',$job->id)}}">
                  @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Edit Title*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" value="{{$job->title}}" name="title" autofocus>
                        @error('title')
                        <div>{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Description*</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" value="{{$job->description}}" name="description" autofocus>
                        @error('description')
                        <div>{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Company Name*</label>
                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" value="{{$job->company_name}}" name="company_name" autofocus>
                        @error('company_name')
                        <div>{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Office Location*</label>
                        <input type="text" class="form-control @error('office_location') is-invalid @enderror" id="office_location" value="{{$job->office_location}}" name="office_location" autofocus>
                        @error('office_location')
                        <div>{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Salary Range*</label>
                        <input type="text" class="form-control @error('salary_range') is-invalid @enderror" id="salary_range" value="{{$job->salary_range}}" name="salary_range" autofocus>
                        @error('salary_range')
                        <div>{{$message}}</div>
                        @enderror
                    </div>                         
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Select Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection