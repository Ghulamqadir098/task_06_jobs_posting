<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidate Signup</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">Signup as Employer</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('signup.employer')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                @error('email')
                                <div>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="signup" class="form-label">Full Name*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                @error('name')
                                <div>{{$message}}</div>
                               @enderror
                            
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Company Name*</label>
                                <input type="text" class="form-control" id="company_name" name="company_name">
                                @error('company_name')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="signup" class="form-label">Company Logo*</label>
                                <input type="file" class="form-control" id="company_logo" name="company_logo">
                                @error('company_logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Location*</label>
                                <input type="text" class="form-control" id="company_location" name="company_location">
                                @error('company_location')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Head Count*</label>
                                <input type="number" class="form-control" id="head_count" name="head_count">
                                @error('head_count')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div>{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                <div>{{ $message }}</div>
                            @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Signup</button>
                            <a href="{{url('/')}}" class="float-end btn btn-primary">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
