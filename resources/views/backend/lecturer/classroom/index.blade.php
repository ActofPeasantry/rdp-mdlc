
@extends('layout/main')


@section('page_name')
    <h1>Kelola Dosen</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Dosen' => '#'
        )
    )
  !!}
@endsection

@section('content')
<style>
  .card img{
    width:50%;
  }
</style>
<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <div class="row">
                <h3 class="card-title ml-auto col-lg-8">List User</h3>
                <div class="ml-auto col-lg-2">
                    <a href={{route("lecturer.classrooms.create")}} class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Kelas
                    </a>
                </div>
                <div class="ml-auto col-lg-2">
                    <a href={{route("lecturer.classrooms.join")}} class="btn btn-block btn-outline-info btn-sm">
                        <i class="far fa-plus-square"></i>
                        Masuk Kelas
                    </a>
                </div>
            </div>
          </div>
          <div class="row">
            @foreach ($groups as $group)
            <div class="col-4">
              <!-- /.card-header -->
              <a href="{{route('lecturer.classrooms.materi', $group->id)}}">
              <div class="card-body">
                <div class="card">
                  <img src="{{asset('image/group.JPG')}}" alt="Avatar">
                  <div class="container">
                    <h4><b>{{$group->name}}</b></h4>
                    <p>{{$group->lecturers->name}}</p>
                  </div>
                </div>
              </div>
              </a>
              <!-- /.card-body -->
            </div>
            @endforeach
          </div>
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
    </s>

    <script>
        function delete_lecturer($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-user-form-" + $id).submit();
            }
        }
    </script>
@endsection
