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
                                <input type="text" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus>
                                @error('title')
                                <div>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Description*</label>
                                <input type="text" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required autofocus>
                                @error('description')
                                <div>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Company Name*</label>
                                <input type="text" value="{{old('company_name')}}" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" required autofocus>
                                @error('company_name')
                                <div>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Office Location*</label>
                                <input type="text" value="{{old('office_location')}}" class="form-control @error('office_location') is-invalid @enderror" id="office_location" name="office_location" required autofocus>
                                @error('office_location')
                                <div>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Salary Range*</label>
                                <input type="text" value="{{old('salary_range')}}" class="form-control @error('salary_range') is-invalid @enderror" id="salary_range" name="salary_range" required autofocus>
                                @error('salary_range')
                                <div>{{$message}}</div>
                                @enderror
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