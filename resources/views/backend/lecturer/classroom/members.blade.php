
<!-- /.card-header -->
<div class="card-body">
  <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
    <thead class="text-center">
        <th>Members</th>
        @can('isLecturer')
            <th>Action</th>
        @endcan
    </thead>
    <tbody class="text-left">
      @foreach ($classrooms->details as $classroom)
        <tr>
            <td>{{$classroom->students->name}} ({{$classroom->students->nim}})</td>
            @can('isLecturer')
                <td>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_members({{$classroom->students->id}})"><i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                </td>
            @endcan
        </tr>

        <form id="delete-members-form-{{$classroom->students->id}}" action="{{route('lecturer.classrooms.memberDestroy', $classroom->id)}}" method="POST">
            @csrf
            @method("DELETE")
        </form>
      @endforeach
    </tbody>
  </table>
</div>
<!-- /.card-body -->
@section('javascripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                "order": [[ 0, "asc" ]]
            });
        } );
    </script>

  <script>
    function delete_members($id) {
        event.preventDefault();
        if(confirm("Apakah anda ingin menghapus data ini?")){
            $("#delete-members-form-" + $id).submit();
        }
    }
  </script>
@endsection
