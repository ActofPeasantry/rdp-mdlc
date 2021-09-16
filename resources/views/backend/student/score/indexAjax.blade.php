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
            // 'Kelola Detail Kelas' => route('classrooms.task', $question->task->classroom_id),
            // 'Kelola Pertanyaan' => route('tasks.show', $question->task_id),
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
                <div id="page_data">
                    @foreach ($paginator as $page)
                        <?php echo nl2br($page->text) ; ?>
                    @endforeach
                </div>
            <br>
            <br>

            <form method="POST" action="{{route('student.scores.store')}}">
                    @csrf
                    {{-- Text --}}
                    <div class="form-group mb-12">
                        <label class="form-label">Jawab</label>
                        @foreach ($paginator as $page)
                            <textarea name="text" id="text[{{  }}]" ></textarea>
                        @endforeach
                        {{-- <input type="hidden" value="{{$no}}" name="no"> --}}
                        {{-- <input type="hidden" value="{{$score_id}}" name="score_id"> --}}
                        {{-- <input type="hidden" value="{{$question->id}}" name="question_id">
                        <input type="hidden" value="{{$question->task_id}}" name="task_id"> --}}

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="text-center">
                        {{ $paginator->links() }}
                        <a href="" class="btn btn-default">Batalkan</a>
                        <button class="btn btn-success" type="submit">Selesai</button>
                    </div>



                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')
    <script>
        // $(document).ready( function(){
        //   $(document).on('click', '.pagination a', function(event){
        //       event.preventDefault();
        //       var task_id = $(this).attr('href').split('task_id=')[1];
        //       fetch_data(task_id);
        //   });

        //   $.ajax({
        //       url : "/student/scores?task_id="+page,
        //       success:function(data){
        //         $('#table_data').html(data);
        //       }
        //   })

        // });
    </script>
@endsection



