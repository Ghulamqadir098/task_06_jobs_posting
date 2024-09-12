
       
@extends('layout.layout')


@section('datatable')
    
<script type="text/javascript">
    $(function () {
          
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('total.employers.view') }}",
          columns: [
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'company_name', name: 'company_name'}
          ]
      });
          
    // Handle delete button click
    $('.data-table').on('click', '.delete-job', function() {
        var id = $(this).data('id');
        var url = "{{ url('job/delete') }}/" + id;

        if (confirm("Are you sure you want to delete this Job?")) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    alert('Job deleted successfully');
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
        <h3 class="card-header p-3">Posted Jobs</h3>
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company Name</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection