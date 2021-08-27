
@extends('layout/main')


@section('page_name')
    <h1>Detail Kelas {{$classrooms->name}}</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Kelas' => '#'
        )
    )
  !!}
@endsection

@section('content')
<style>
  .card-header ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
  }

  .card-header li {
      float: left;
      width: 100px;
  }

  .card-header li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
  }

  .card-header li a:hover:not(.active) {
      background-color: #111;
  }

  .card-header .active {
      background-color: #4CAF50;
  }
</style>
<div class="container-fluid">
  @can('isLecturer')
          @include('backend.lecturer.classroom.edit')
        @endcan
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="ml-left col-lg-2">
                    <span class="btn btn-block btn-outline-info btn-sm">Code : {{$classrooms->code}}</span>
                </div>
                @can('isLecturer')
                <div class="ml-auto col-lg-2">
                    <a href="javascript:void(0)" onclick="edit({{$id}},'{{$classrooms->name}}')" class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Kelas
                    </a>
                </div>
                <div class="ml-right col-lg-2">
                    <a href="javascript:void(0)" onclick="delete_class({{$id}})" class="btn btn-block btn-outline-danger btn-sm">
                        <i class="far fa-minus-square"></i>
                        Hapus Kelas
                    </a>
                </div>
                <!-- <div class="ml-auto col-lg-2">
                    <a href={{route("lecturer.classrooms.create")}} class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Kelas
                    </a>
                </div>
              <br> -->
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
            <br>
            <div>
              @if($status=='members')
                <ul>
                  <li><a href="{{route('lecturer.classrooms.materi', $id)}}">Materi</a></li>
                  <li><a class="active" href="{{route('lecturer.classrooms.members', $id)}}">Members</a></li>
                </ul>
              @elseif($status=='materi')
                <ul>
                  <li><a class="active" href="{{route('lecturer.classrooms.materi', $id)}}">Materi</a></li>
                  <li><a href="{{route('lecturer.classrooms.members', $id)}}">Members</a></li>
                </ul>
              @endif
            </div>
          </div>
          @if($status=='members')
            @include('backend.lecturer.classroom.members')
          @elseif($status=='materi')
            @include('backend.lecturer.classroom.materi')
          @endif
          <form id="delete-class-form-{{$id}}" action="{{route('lecturer.classrooms.destroy', $id)}}" method="POST">
            @csrf
            @method("DELETE")
          </form>
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
        function delete_class($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-class-form-" + $id).submit();
            }
        }    

        function edit(id, name) {
          
          if($('#edit').is(":visible") && id==id_awal){
            $('#edit').hide('500');
          }else{
            $('#edit').show('500');
            $('#name').val(name);
            $('#form-update').attr('action', "{{route('lecturer.classrooms.index')}}/update/"+id);
          }

          $('#create').hide('500');
          id_awal = id;
        }   
    </script>
@endsection
