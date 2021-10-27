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
                            <img src="{{asset('image/task.png')}}" alt="Avatar" width="50dp">
                        </div>

                        <div class="col-10">

                            @can('isLecturer')
                                <a href="{{route('lecturer.materials.show', $material->id)}}">
                                    <h4>{{$material->title}}</h4>

                                    <input type="hidden" id="material-abstract" value="{{ $material->abstract }}">
                                    <div id="abstract-{{ $key }}"></div>
                                </a>
                                <a class="btn btn-primary" href="{{ route('lecturer.materials.edit', [$material->id]) }}"> Edit </a>
                                {{-- <a class="btn btn-danger" href="{{ route('lecturer.materials.destroy', [$material->id]) }}"> Hapus </a> --}}

                                <button type='button' class="btn btn-sm btn-danger" onclick="delete_material({{$material->id}})" >
                                    <i class="far fa-trash-alt"></i>
                                    Hapus
                                </button>

                                <form id="delete-material-form-{{$material->id}}" action="{{route('lecturer.materials.destroy', $material->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            @endcan

                            @can('isStudent')
                                <a href="{{route('student.materials.show', $material->id)}}">
                                    <h4>{{$material->title}}</h4>

                                    <input type="hidden" id="material-abstract" value="{{ $material->abstract }}">
                                    <div id="abstract-{{ $key }}"></div>
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

@section('javascripts')
    <script>
        function delete_material($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-material-form-" + $id).submit();
            }
        }
    </script>
@endsection
