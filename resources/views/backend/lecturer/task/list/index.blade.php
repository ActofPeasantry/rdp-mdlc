
@extends('layout/main')


@section('page_name')
    <h1>Kelola Pengumpulan</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Pengumpulan' => '#'
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
                <h3 class="card-title">List Pengumpulan</h3>
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
                  @foreach ($lists as $list)
                    <tr>
                      <td>{{$n}}</td>
                      <td>{{$list->students->name}}</td>
                      <td>{{$list->students->users->username}}</td>
                      <td>{{$list->students->users->email}}</td>
                      <td>
                        <a href= {{route('lecturer.ScoreDetail.show', [$list->id])}} class="btn btn-sm btn-info">
                          <i class="fa fa-eye"></i>
                          Lihat Jawaban
                        </a>
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
