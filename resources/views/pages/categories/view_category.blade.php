
       
@extends('layout.layout')

@section('datatable')
{{-- Datatables script --}}
<script type="text/javascript">
    $(function () {
          
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('category.view') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    // Handle delete button click
    $('.data-table').on('click', '.delete-category', function() {
        var id = $(this).data('id');
        var url = "{{ url('category/delete') }}/" + id;

        if (confirm("Are you sure you want to delete this category?")) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    alert('Category deleted successfully');
                    table.ajax.reload(); // Reload DataTable
                },
                error: function(xhr) {
                    alert('Error deleting category');
                }
            });
        }
    });

    });
  </script>
@endsection




@section('content')
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">Categories</h3>
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
       
       


