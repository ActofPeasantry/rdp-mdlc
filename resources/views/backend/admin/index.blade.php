
@extends('layout/main')


@section('page_name')
    <h1>User Management</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'User Management' => '#'
        )
    )
  !!}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $n=1; ?>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{$n}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->email}}</td>
                      <td >
                        <div class="col-xs-1" align="center">
                          <a href= {{route('admin.users.edit', [$user->id])}} class="btn btn-sm btn-info">
                            <i class="fa fa-pencil-alt"></i>
                            Ubah
                          </a>

                          <button type='button' class="btn btn-sm btn-danger" onclick="delete_user({{$user->id}})" >
                            <i class="far fa-trash-alt"></i>
                            Hapus
                          </button>

                          <form id="delete-user-form-{{$user->id}}" action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                          </form>

                        </div>
                      </td>
                    </tr>
                  <?php $n++;?>
                  @endforeach
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
@endsection

@section('javascripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

    <script>
        function delete_user($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-user-form-" + $id).submit();
            }
        }
    </script>
@endsection
