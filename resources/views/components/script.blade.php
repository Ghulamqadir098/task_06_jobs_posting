<script>
    const dropdown = document.querySelector('.dropdown');

    dropdown.addEventListener('click', () => {
        dropdown.classList.toggle('open');
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>


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
