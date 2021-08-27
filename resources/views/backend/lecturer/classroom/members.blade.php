
          <!-- /.card-header -->
          <div class="card-body">
            <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
              <thead class="text-center">
                  <th>Members</th>
              </thead>
              <tbody class="text-left">
                @foreach ($classrooms->details as $classroom)
                  <tr>
                    <td>{{$classroom->students->name}} ({{$classroom->students->nim}})</td>
                  </tr>
                @endforeach
              </tbody>
            </table>            
          </div>
          <!-- /.card-body -->
