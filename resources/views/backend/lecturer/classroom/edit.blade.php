<div class="row" id="edit" style="display:none">
    <!-- Default box -->
    <div class="card col-md-12">
        <div class="card-header">
          <h3 class="card-title">Mengubah Kelas</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" id="form-update">
                    @csrf
                    @method("PATCH")
                    @include('backend.lecturer.classroom.group_form', ['create' => true])               

                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

