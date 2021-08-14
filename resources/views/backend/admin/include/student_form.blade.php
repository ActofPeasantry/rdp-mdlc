{{-- Name --}}
<div class="form-group mb-3">
    <label class="form-label" for="name">Nama User</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
    value="{{ old('name') }} @isset($user) {{$student->name}}  @endisset"
    required autocomplete="name">

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

{{-- Username --}}
<div class="form-group mb-3">
    <label class="form-label" for="username">Username</label>
    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"
    value="{{ old('username') }} @isset($user) {{$student->users->username}}  @endisset"
    required autocomplete="username">

    @error('username')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

{{-- Email --}}
<div class="form-group mb-3">
    <label class="form-label" for="email">Alamat email user</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
    value="{{ old('email') }} @isset($user) {{$student->users->email}}  @endisset"
    required autocomplete="email">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Password --}}
@isset($create)
    <div class="form-group mb-3">
        <label class="form-label" for="password">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endisset

@isset($edit)
    <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" autocomplete="new-password"
    value="{{$student->user_id}}" hidden>
@endisset

{{-- NIM --}}
<div class="form-group mb-3">
    <label class="form-label" for="name">NIM</label>
    <input id="nim" type="text" class="form-control @error('name') is-invalid @enderror" name="nim"
    value="{{ old('name') }} @isset($user) {{$student->nim}}  @endisset"
    required autocomplete="nim">

    @error('nip')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

{{-- Birthplace --}}
<div class="form-group mb-3">
    <label class="form-label" for="name">Tempat Lahir</label>
    <input id="birthplace" type="text" class="form-control @error('name') is-invalid @enderror" name="birthplace"
    value="{{ old('name') }} @isset($user) {{$student->birthplace}}  @endisset"
    required autocomplete="birthplace">

    @error('birthplace')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

{{-- Address --}}
<div class="form-group mb-3">
    <label class="form-label" for="address">Alamat</label>
    <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="address"
    value="{{ old('name') }} @isset($user) {{$student->address}}  @endisset"
    required autocomplete="address">

    @error('birthplace')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

{{-- Phone --}}
<div class="form-group mb-3">
    <label class="form-label" for="phone">Nomor Telepon</label>
    <input id="phone" type="text" class="form-control @error('name') is-invalid @enderror" name="phone"
    value="{{ old('name') }} @isset($user) {{$student->phone}}  @endisset"
    required autocomplete="address">

    @error('birthplace')
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
</div>
