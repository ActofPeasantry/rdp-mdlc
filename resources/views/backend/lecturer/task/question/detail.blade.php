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
            'Lihat Tugas/Kuis' => '#'
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

            <?php echo nl2br($question->text) ; ?>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')

@endsection



