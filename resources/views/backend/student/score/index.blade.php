@extends('layout/main')


@section('page_name')
    <h1>List Pertanyaan</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Kelas' => route('classrooms.index'),
            'Kelola Detail Kelas' => route('classrooms.task', $question->task->classroom_id),
            'Kelola Pertanyaan' => route('tasks.show', $question->task_id),
            'Detail' => '#'
        )
    )
  !!}
@endsection

@section('content')
    <!-- Default box -->
    <div class="card col-md-12">
        <div class="card-header">
            <h3 class="card-title">Pertanyaan</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

            <?php echo nl2br($question->text) ; ?>
            <br>
            <br>

            <form method="POST" action="{{route('student.scores.store')}}">
                    @csrf
                    {{-- Text --}}
                    <div class="form-group mb-12">
                        <label class="form-label">Jawab</label>
                        <textarea name="text" id="text" >@if($detail!=NULL){{$detail->text}}@endif</textarea>
                        <input type="hidden" value="{{$no}}" name="no">
                        <input type="hidden" value="{{$score_id}}" name="score_id">
                        <input type="hidden" value="{{$question->id}}" name="question_id">
                        <input type="hidden" value="{{$question->task_id}}" name="task_id">

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="text-center">
                        <a href="" class="btn btn-default">Batalkan</a>
                        @if($no == $total-1)
                        <button class="btn btn-success" type="submit">Selesai</button>
                        @else
                        <button class="btn btn-success" type="submit">Selanjutnya</button>
                        @endif
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



