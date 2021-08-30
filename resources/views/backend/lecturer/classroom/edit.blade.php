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
                    {{-- Name --}}
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Nama Kelas</label>
                        <input id="e_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }} @isset($user) {{$lecturer->name}}  @endisset"
                        required autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="text-center">
                        <button onclick="$('#edit').hide('500');" type="button" class="btn btn-default">Batalkan</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>              

                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

