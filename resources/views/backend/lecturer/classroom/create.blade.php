<div class="row" id="create" style="display:none">
    <!-- Default box -->
    <div class="card col-md-12">
        <div class="card-header">
          <h3 class="card-title">Menambahkan Kelas</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" action="{{ route('lecturer.classrooms.store') }}">
                    @csrf
                    @include('backend.lecturer.classroom.group_form', ['create' => true])

                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

