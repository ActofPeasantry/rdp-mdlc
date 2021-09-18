<!-- /.card-header -->
<div class="card-body">
    <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline">
        <thead class="text-center">
            <th>Materi Belajar</th>
        </thead>
        <tbody class="text-left">

        @foreach ($materials as $key => $material)
            <tr>
                <td>
                    <div class="row">
                        <div class="ml-right col-1">
                            <img src="{{asset('image/task.JPG')}}" alt="Avatar" width="50dp">
                        </div>

                        <div class="col-10">
                            <a href="{{route('lecturer.materials.show', $material->id)}}">
                                <h4>{{$material->title}}</h4>

                                <input type="hidden" id="material-abstract" value="{{ $material->abstract }}">
                                <div id="abstract-{{ $key }}"></div>
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
