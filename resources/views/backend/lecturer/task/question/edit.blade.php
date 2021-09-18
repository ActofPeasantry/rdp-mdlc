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
    <!-- Default box -->
    <div class="card col-md-12">
        <div class="card-header">
          <h3 class="card-title">Mengubah Pertanyaan</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" action="{{route('lecturer.questions.update', $question->id)}}">
                    @csrf
                    @method("PATCH")
                    {{-- Text --}}
                    <div class="form-group mb-3">
                        <label class="form-label">Pertanyaan</label>
                        <textarea name="text" id="text" cols="30" rows="10">{{$question->text}}</textarea>
                        
                        <p></p>

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-2 col-lg-2 col-form-label">Nilai Maksimal</label>
                        <label class="col-xl-1 col-lg-1 col-form-label">:</label>
                        <div class="col-lg-9 col-xl-9">
                            <input type="number" name="max_score" id="max_score" value="{{$question->max_score}}"></input>

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{route('lecturer.tasks.show', $tasks->id)}}" class="btn btn-default">Batalkan</a>
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




