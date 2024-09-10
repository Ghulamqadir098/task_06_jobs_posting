@extends('layout.layout')

@section('content')
    <div class="main-body">



        <table class="table bg-success">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Assigned to</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
              


    <tr>
        <th scope="row">Hello World!</th>
        <td>This is my name</td>
        <td>Status</td>
        <td>
        <a href="#" class="btn btn-sm btn-info">Edit</a>
        <form action="#" method="POST">
            
            @csrf
            @method('DELETE')
            <button class="input_field btn btn-danger" type="submit">Delete</button>
        </form>  
        </td>

    </tr>
            </tbody>
        </table>
    </div>
@endsection
