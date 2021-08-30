
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
          @include('backend.lecturer.task.question.create')
          @include('backend.lecturer.classroom.edit')
        @endcan
        <div class="card">
          <div class="card-header">
            <div class="row">
                <h3 class="card-title ml-left col-lg-8">List Pertanyaan</h3>
                @can('isLecturer')
                <div class="ml-auto col-lg-2">
                    <a href="javascript:void(0)" onclick="$('#create').toggle(500);$('#edit').hide(500);" class="btn btn-block btn-outline-success btn-sm">
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
                          <img src="{{asset('image/task.JPG')}}" alt="Avatar" width="50dp">
                        </div>
                        <div class="col-4">
                          <a href="{{route('lecturer.tasks.show', $task->id)}}">
                            <h4>{{$question->name}}</h4>
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
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
            console.log(name);
            $('#e_name').val(name);
            $('#form-update').attr('action', "{{route('lecturer.classrooms.index')}}/update/"+id);
          }

          $('#create').hide('500');
          id_awal = id;
        }   

        tinymce.init({
          selector: "textarea",
          plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste"
          ],

      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

      });
    </script>
@endsection
