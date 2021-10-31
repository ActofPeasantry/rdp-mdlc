
<!-- /.card-header -->
<div class="card-body">
  <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
    <thead class="text-center">
        <th>List Tugas</th>

        @can('isStudent')
        <th>Nilai</th>
        @endcan

    </thead>
    <tbody class="text-left">
      @foreach ($tasks as $task)
        <tr>
            <td>
                <div class="row">
                    <div class="ml-right col-1">
                    <img src="{{asset('image/task.png')}}" alt="Avatar" width="50dp">
                    </div>

                    <div class="col-4">
                    @can('isLecturer')
                        <a href="{{route('tasks.show', $task->id)}}">
                            <h4>{{$task->name}}</h4>
                            {{-- <p>{{$task->due_date}} &nbsp;&nbsp;{{$task->time}}</p> --}}
                            <h6>Tanggal Mulai    : {{$task->start_at}}</h6>
                            <h6>Tanggal Berakhir : {{$task->end_at}}</h6>
                        </a>
                    @endcan
                    @can('isStudent')
                        <!-- <a href='{{route("student.scores.index", "task_id=$task->id" )}}'> -->
                        <a href="javascript:void(0)" onclick="modal({{$task->id}})" data-toggle="modal" data-target="#scoreModal">
                            <h4>{{$task->name}}</h4>
                            <h6>Tanggal Mulai    : {{$task->start_at}}</h6>
                            <h6>Tanggal Berakhir : {{$task->end_at}}</h6>
                        </a>
                    @endcan
                    </div>

                </div>
            </td>
            @can('isStudent')
            <td>
                @foreach ($task->scores as $score)

                @endforeach
                @if ( $score->student_id == $student->id )
                    @if (!isset($score->total_score))
                        <p class="text-center" > Tugas Belum Dinilai </p>
                    @else
                        <p class="text-center" >Nilai :{{ $score->total_score }}</p>
                    @endif
                @else
                    <p class="text-center"> Tugas Belum dikerjakan </p>
                @endif
            </td>
            @endcan
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- /.card-body -->

@section('javascripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                "columnDefs": [ { "width": "40%", "targets": 1  }],
                "ordering": false
            });
        } );

        function modal(id) {
            console.log(id);
            $('#task_id').val(id);
        }
    </script>
@endsection
