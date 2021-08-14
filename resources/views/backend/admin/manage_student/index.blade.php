
@extends('layout/main')


@section('page_name')
    <h1>Kelola Mahasiswa</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Mahasiswa' => '#'
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
            <div class="row">
                <h3 class="card-title">List User</h3>
                <div class="ml-auto col-lg-2">
                    <a href={{route("admin.students.create")}} class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Mahasiswa
                    </a>
                </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                  <?php $n=1; ?>
                  @foreach ($students as $student)
                    <tr>
                      <td>{{$n}}</td>
                      <td>{{$student->name}}</td>
                      <td>{{$student->users->username}}</td>
                      <td>{{$student->users->email}}</td>
                      <td >
                        <div class="col-xs-1" align="center">
                          <a href= {{route('admin.students.edit', [$student->id])}} class="btn btn-sm btn-info">
                            <i class="fa fa-pencil-alt"></i>
                            Ubah
                          </a>

                          <button type='button' class="btn btn-sm btn-danger" onclick="delete_student({{$student->id}})" >
                            <i class="far fa-trash-alt"></i>
                            Hapus
                          </button>

                          <form id="delete-user-form-{{$student->id}}" action="{{route('admin.students.destroy', $student->user_id)}}" method="POST">
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
        function delete_student($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-user-form-" + $id).submit();
            }
        }
    </script>
@endsection
