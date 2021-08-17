{{-- Name --}}
<div class="form-group mb-3">
    <label class="form-label" for="name">Nama Kelas</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
    value="{{ old('name') }} @isset($user) {{$lecturer->name}}  @endisset"
    required autocomplete="name">

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
    </div>
    <!-- /.col -->
</div>
