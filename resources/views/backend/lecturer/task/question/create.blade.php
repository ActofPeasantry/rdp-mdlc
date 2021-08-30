<div class="row" id="create" style="display:none">
    <!-- Default box -->
    <div class="card col-md-12">
        <div class="card-header">
          <h3 class="card-title">Menambahkan Pertanyaan</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" action="{{ route('lecturer.questions.store') }}">
                    @csrf
                    {{-- Text --}}
                    <div class="form-group mb-3">
                        <label class="form-label">Pertanyaan</label>
                        <textarea name="text" id="text" cols="30" rows="10"></textarea>
                        <input type="hidden" name="task_id" value="{{$id}}">

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="text-center">
                        <button onclick="$('#create').hide('500');" type="button" class="btn btn-default">Batalkan</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>



                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

