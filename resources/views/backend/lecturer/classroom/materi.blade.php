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

                                        <input type="hidden" id="material-abstract-{{ $key }}" value="{{ $material->abstract }}">
                                        <div id="abstract-{{ $key }}"></div>
                                    </a>

                                    <div class="dropdown">
                                        <button class="dropbtn btn btn-icon btn-circle btn-label-facebook"><i class="fas fa-cogs"></i></button>
                                        <div class="dropdown-content">
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_material({{$material->id}})">
                                                <i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus
                                            </a>

                                            <a class="dropdown-item" href="{{ route('lecturer.materials.edit', [$material->id]) }}">
                                                <i class="fas fa-pen"></i>&nbsp;&nbsp;Edit
                                            </a>
                                        </div>
                                    </div>

                                    {{-- <a class="btn btn-primary" href="{{ route('lecturer.materials.edit', [$material->id]) }}"> Edit </a>

                                    <button type='button' class="btn btn-danger" onclick="delete_material({{$material->id}})" >
                                        <i class="far fa-trash-alt"></i>
                                        Hapus
                                    </button> --}}

                                    <form id="delete-material-form-{{$material->id}}" action="{{route('lecturer.materials.destroy', $material->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                @endcan

                                @can('isStudent')
                                    <a href="{{route('student.materials.show', $material->id)}}">
                                        <h4>{{$material->title}}</h4>

                                        <input type="hidden" id="material-abstract-{{ $key }}" value="{{ $material->abstract }}">
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
        $(document).ready( function () {
            $('#table_id').DataTable({
                "order": [[ 0, "asc" ]]
            });
        } );
    </script>

    <script>
        var $n = 0;
        $('#table_id > tbody  > tr').each(function(){
            str = $( "#material-abstract-" + $n ).val(),
            $log = $( "#abstract-" + $n ),
            html = $.parseHTML( str ),
            nodeNames = [];
            $n++;

            // Append the parsed HTML
            $log.append( html );
        });
    </script>

    <script>
        function delete_material($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-material-form-" + $id).submit();
            }
        }
    </script>
@endsection
