
<!-- /.card-header -->
<div class="card-body">
  <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
    <thead class="text-center">
        <th>Members</th>
    </thead>
    <tbody class="text-left">
      @foreach ($tasks as $task)
        <tr>
          <td>
            <div class="row">
              <div class="ml-right col-1">
                <img src="{{asset('image/task.PNG')}}" alt="Avatar" width="50dp">
              </div>
              <div class="col-4">
                @can('isLecturer')
                <a href="{{route('tasks.show', $task->id)}}">
                  <h4>{{$task->name}}</h4>
                  <p>mulai :{{$task->start_at}} &nbsp;&nbsp;</p>
                  <p>berakhir :{{$task->end_at}} &nbsp;&nbsp;</p>
                </a>
                @endcan
                @can('isStudent')
                {{-- <a href='{{route("student.scores.index", "task_id=$task->id" )}}'> --}}
                <a href="javascript:void(0)" onclick="modal({{$task->id}})" data-toggle="modal" data-target="#scoreModal">
                  <h4>{{$task->name}}</h4>
                  <p>{{$task->due_date}} &nbsp;&nbsp;{{$task->time}}</p>
                </a>

                <div class="modal fade" id="scoreModal" tabindex="-1" role="dialog" aria-labelledby="scoreModalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="scoreModalTitle">Memulai Kuis</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{route('student.scores.index')}}">
                          <div class="modal-body">
                              <p>Apakah anda ingin memulai kuis?</p>
                              <input type="hidden" id="task_id" name="task_id">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <button  type="submit" class="btn btn-primary">Ya</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                @endcan
              </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- /.card-body -->
