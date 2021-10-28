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
            'Kelola Detail Kelas' => route('classrooms.task', $question->task->classroom_id),
            'Kelola Tugas/Kuis' => route('lecturer.tasks.show', $question->task_id),
            'Lihat Pertanyaan' => '#'
        )
    )
  !!}
@endsection

@section('content')
    <!-- Default box -->
    <div class="card col-md-12">
        <div class="card-header">
            <h3 class="card-title">Lihat Pertanyaan</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                @if ($question->video_file != null)
                    <video width="360" height="280" controls>
                        <source src="{{ $question->video_file }}" type="video/mp4">
                        <source src="{{ $question->video_file }}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <br>
                    <br>
                @endif

                @if ($question->audio_file != null)
                    <audio width="360" height="280" controls>
                        <source src="{{ $question->audio_file }}" type="audio/mpeg">
                        <source src="{{ $question->audio_file }}" type="audio/ogg">
                        Your browser does not support the video tag.
                    </audio>
                    <br>
                    <br>
                @endif

                <?php echo nl2br($question->text) ; ?>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')

@endsection



