
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
                  <p>{{$task->due_date}} &nbsp;&nbsp;{{$task->time}}</p>
                </a>
                @endcan
                @can('isStudent')
                <!-- <a href='{{route("student.scores.index", "task_id=$task->id" )}}'> -->
                <a href="javascript:void(0)" onclick="modal({{$task->id}})" data-toggle="modal" data-target="#scoreModal">
                  <h4>{{$task->name}}</h4>
                  <p>{{$task->due_date}} &nbsp;&nbsp;{{$task->time}}</p>
                </a>
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
