
@extends('layout/main')


@section('page_name')
    <h1>Kelola Pertanyaan</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Kelas' => route('classrooms.index'),
            'Kelola Detail Kelas' => route('classrooms.task', $tasks->classroom_id),
            'Kelola Pertanyaan' => '#'
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
                <h3 class="card-title ml-left col-lg-8">List Pertanyaan</h3>
                @can('isLecturer')
                <div class="ml-auto col-lg-2">
                    <a href="{{route('lecturer.tasks.list', $id)}}" class="btn btn-block btn-outline-info btn-sm">
                        <i class="far fa-eye-square"></i>
                        List Pengumpulan
                    </a>
                </div>
                <div class="ml-auto col-lg-2">
                    <a href="{{route('lecturer.questions.create', $id)}}" class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Pertanyaan
                    </a>
                </div>
                <!-- <div class="ml-auto col-lg-2">
                    <a href={{route("lecturer.classrooms.create")}} class="btn btn-block btn-outline-success btn-sm">
                        <i class="far fa-plus-square"></i>
                        Tambah Kelas
                    </a>
                </div> -->
                @endcan
            </div>
          </div>
          <div class="card-body">
            <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
              <thead class="text-center">
                  <th>List Pertanyaan</th>
              </thead>
              <tbody class="text-left">
                @foreach ($tasks->question as $question)
                  <tr>
                    <td>
                      <div class="row">
                        <div class="ml-right col-1">
                          <img src="{{asset('image/task.PNG')}}" alt="Avatar" width="50dp" height="40dp">
                        </div>
                        <div class="col-4">

                            <p><?php
                              $karakter = strlen($question->text);
                              if($karakter<20){
                                echo substr(nl2br($question->text), 0, 20) ;
                              }else{
                                echo substr(nl2br($question->text), 0, 20).' ...';
                              }
                            ?>  <i>(max: {{$question->max_score}} point)</i></p>

                        </div>
                        <div class="ml-right col-lg-2">
                          <div class="dropdown">
                            <button class="dropbtn btn btn-icon btn-circle btn-label-facebook"><i class="fas fa-cogs"></i></button>
                            <div class="dropdown-content">
                              <a class="dropdown-item" href="{{route('lecturer.questions.show', $question->id)}}""><i class="fas fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                              <a class="dropdown-item" href="javascript:void(0)" onclick="delete_question({{$question->id}})"><i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                              <a class="dropdown-item" href="{{route('lecturer.questions.edit', $question->id)}}"><i class="fas fa-pen"></i>&nbsp;&nbsp;Edit</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <form id="delete-question-form-{{$question->id}}" action="{{route('lecturer.questions.destroy', $question->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                  </form>
                @endforeach
              </tbody>
            </table>
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



        function delete_question($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-question-form-" + $id).submit();
            }
        }

        function edit(id, text) {

          if($('#edit').is(":visible") && id==id_awal){
            $('#edit').hide('500');
          }else{
            $('#edit').show('500');
            console.log(text);
            document.getElementById("e_text").innerHTML="<b>" + text +"</b>";
            $('#form-update').attr('action', "{{route('lecturer.classrooms.index')}}/update/"+id);
          }

          $('#create').hide('500');
          id_awal = id;
          return text;
        }


    </script>
@endsection
