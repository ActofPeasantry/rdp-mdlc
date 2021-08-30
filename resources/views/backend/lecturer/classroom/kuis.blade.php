
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
                          <img src="{{asset('image/task.JPG')}}" alt="Avatar" width="50dp">
                        </div>
                        <div class="col-4">
                          <a href="{{route('lecturer.tasks.show', $task->id)}}">
                            <h4>{{$task->name}}</h4>
                            <p>{{$task->due_date}} &nbsp;&nbsp;{{$task->time}}</p>
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>            
          </div>
          <!-- /.card-body -->
