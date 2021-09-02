
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
            'Kelola Kelas' => route('lecturer.classrooms.index'),
            'Detail Kelas' => '#',
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('lecturer.tasks.store') }}">
                <div class="modal-body">
                      @csrf
                      <input type="hidden" value="{{$classrooms->id}}" name="classroom_id">
                      <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label">Judul</label>
                          <label class="col-xl-1 col-lg-1 col-form-label">:</label>
                          <div class="col-lg-9 col-xl-9">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }} @isset($user) {{$lecturer->name}}  @endisset"
                            required autocomplete="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label">Due Date</label>
                          <label class="col-xl-1 col-lg-1 col-form-label">:</label>
                          <div class="col-lg-5 col-xl-5">
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                            required autocomplete="date">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="col-lg-4 col-xl-4">
                            <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time"
                            required autocomplete="time">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
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
                    <!-- <a href="javascript:void(0)" onclick="edit({{$id}},'{{$classrooms->name}}')" class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Kelas
                    </a> -->
                    <div class="dropdown">
                      <button class="btn btn-block btn-outline-info btn-sm"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Add Materials</button>
                      <div class="dropdown-content">
                        <a class="dropdown-item" href="{{ route('lecturer.materials.create', $classrooms->id) }}" >&nbsp;&nbsp;Materi</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLong">&nbsp;&nbsp;Kuis</a>
                      </div>
                    </div>
                </div>
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
                  <li><a href="{{route('lecturer.classrooms.task', $id)}}">Kuis</a></li>
                </ul>
              @elseif($status=='materi')
                <ul>
                  <li><a class="active" href="{{route('lecturer.classrooms.materi', $id)}}">Materi</a></li>
                  <li><a href="{{route('lecturer.classrooms.members', $id)}}">Members</a></li>
                  <li><a href="{{route('lecturer.classrooms.task', $id)}}">Kuis</a></li>
                </ul>
              @elseif($status=='kuis')
                <ul>
                  <li><a href="{{route('lecturer.classrooms.materi', $id)}}">Materi</a></li>
                  <li><a href="{{route('lecturer.classrooms.members', $id)}}">Members</a></li>
                  <li><a class="active" href="{{route('lecturer.classrooms.task', $id)}}">Kuis</a></li>
                </ul>
              @endif
            </div>
          </div>
          @if($status=='members')
            @include('backend.lecturer.classroom.members')
          @elseif($status=='materi')
            @include('backend.lecturer.classroom.materi')
          @elseif($status=='kuis')
            @include('backend.lecturer.classroom.kuis')
          @endif
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
