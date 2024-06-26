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
            'Kelola Kelas' => url('classrooms?data=lecturer-data'),
            'Detail Kelas' => route('classrooms.task', $tasks->classroom_id),
            'Kelola Tugas/Kuis' => route('lecturer.tasks.show', $tasks->id),
            'Membuat Pertanyaan' => '#'
        )
    )
  !!}
@endsection

@section('content')
    <!-- Default box -->
    <div class="card col-md-12">
        <div class="card-header">
          <h3 class="card-title">Menambahkan Pertanyaan</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" action="{{ route('lecturer.questions.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- Text --}}
                    <div class="form-group mb-12">
                        <label class="form-label">Pertanyaan</label>
                        <textarea name="text" id="text"></textarea>
                        <input type="hidden" name="task_id" value="{{$id}}">

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label class="" for="video">Upload file video (opsional)</label> <br>
                        <input type="file"  class="form-control-file" name="videoFile" id="videoFile" accept="video/*">
                    </div>

                    <div class="form-group mb-3">
                        <label class="" for="video">Upload file Audio (opsional)</label> <br>
                        <input type="file" class="form-control-file" name="audioFile" id="audioFile"  accept="audio/*">
                    </div>


                    <div class="text-center">
                        <a href="{{route('lecturer.tasks.show', $id)}}" class="btn btn-default">Batalkan</a>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>



                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')

@endsection



