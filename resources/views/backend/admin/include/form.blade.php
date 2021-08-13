{{-- Name --}}
{{-- <div class="form-group mb-3">
    <label class="form-label" for="name">Nama User</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
    value="{{ old('name') }} @isset($user) {{$user->name}}  @endisset"
    required autocomplete="name" placeholder="Nama User">

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div> --}}

{{-- Username --}}
<div class="form-group mb-3">
    <label class="form-label" for="username">Username</label>
    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"
    value="{{ old('username') }} @isset($user) {{$user->username}}  @endisset"
    required autocomplete="username" placeholder="Username">

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

{{-- Email --}}
<div class="form-group mb-3">
    <label class="form-label" for="email">Alamat email user</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
    value="{{ old('email') }} @isset($user) {{$user->email}}  @endisset"
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

{{-- Roles --}}
{{-- <div class="mb-3">
    <label class="form-label" for="roles[]">Roles</label>
    @foreach ($roles as $role)
        <div class="form-check">
            <input id="{{$role->name}}" name="roles[]" class="form-check-input" type="checkbox"
            value="{{$role->id}}"
            //Menceklis role sesuai database
            @isset($user)
                @if (in_array($role->id, $user->roles->pluck('id')->toArray() ))
                    checked
                @endif
            @endisset>
            <label class="form-check-label" for="roles[]">{{$role->name}}</label>
        </div>
    @endforeach
</div> --}}

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
    </div>
    <!-- /.col -->
</div>
