
          <!-- /.card-header -->
          <div class="card-body">
            <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
              <thead class="text-center">
                  <th>kuis</th>
                  @can('isStudent')
                    <th>Status</th>
                  @endcan
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
                            <p>{{$task->due_date}} &nbsp;&nbsp;{{$task->time}}</p>
                          </a>
                          @endcan
                          @can('isStudent')
                          <a href='{{route("student.scores.index", "task_id=$task->id" )}}'>
                            <h4>{{$task->name}}</h4>
                            <p>{{$task->due_date}} &nbsp;&nbsp;{{$task->time}}</p>
                          </a>
                          @endcan
                        </div>
                      </div>
                    </td>
                    @can('isStudent')
                        <td>
                            @if ($task->scores()->where('student_id', $student->id)->count() < 1)
                                Belum dikerjakan
                            @elseif ($task->scores->where('student_id', $student->id)->first()->total_score == null)
                                Belum dinilai
                            @elseif ($task->scores->where('student_id', $student->id)->first()->total_score != null)
                                Nilai kuis : {{ $task->scores->where('student_id', $student->id)->first()->total_score }}
                            @endif
                        </td>
                    @endcan
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
