
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
        @can('isLecturer')
          @include('backend.lecturer.classroom.create')
        @endcan
        <div class="card">
          <div class="card-header">
            <div class="row">
                <h3 class="card-title ml-auto col-lg-8">List User</h3>
                @can('isLecturer')
                <div class="ml-auto col-lg-2">
                    <a href="javascript:void(0)" onclick="$('#create').toggle(500);$('#edit').hide(500);" class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Kelas
                    </a>
                </div>
                <!-- <div class="ml-auto col-lg-2">
                    <a href={{route("lecturer.classrooms.create")}} class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Kelas
                    </a>
                </div> -->
                @endcan
                @can('isStudent')
                <div class="ml-auto col-lg-2">
                    <a href={{route("lecturer.classrooms.join")}} class="btn btn-block btn-outline-info btn-sm">
                        <i class="far fa-plus-square"></i>
                        Masuk Kelas
                    </a>
                </div>
                @endcan
            </div>
          </div>
          <div class="row">
            @foreach ($classrooms as $class)
            <div class="col-4">
              <!-- /.card-header -->
              <a href="{{route('lecturer.classrooms.materi', $class->id)}}">
              <div class="card-body">
                <div class="card">
                  <img src="{{asset('image/group.JPG')}}" alt="Avatar">
                  <div class="container">
                    <h4><b>{{$class->name}}</b></h4>
                    <p>{{$class->lecturers->name}}</p>
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
    </script>

    <script>
        function delete_lecturer($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-user-form-" + $id).submit();
            }
        }

        function edit(id, name) {
          if($('#edit').is(":visible") && id==id_awal){
            $('#edit').hide('500');
          }else{
            $('#edit').show('500');
            $('#e_name').val(name);
            $('#form-update').attr('action', "{{route('lecturer.classrooms.index')}}/"+id);
          }

          $('#create').hide('500');
          id_awal = id;
        }
    </script>
@endsection
