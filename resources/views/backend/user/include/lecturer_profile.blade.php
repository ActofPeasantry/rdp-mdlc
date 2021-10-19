{{-- Username --}}
<div class="form-group mb-3">
    <label class="form-label" for="username">Username</label> <br>
    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}" required autocomplete="username" placeholder="Username" autofocus>

    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Email --}}
<div class="form-group mb-3">
    <label class="form-label" for="email">Email</label> <br>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email  }}" required autocomplete="email" placeholder="Email">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Password --}}
{{-- <div class="form-group mb-3">
    <label class="form-label" for="password">Password</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div class="input-group-append">
    <div class="input-group-text">
        <span class="fas fa-lock"></span>
    </div>
    </div>
</div> --}}

{{-- Confirmation Password --}}
{{-- <div class="form-group mb-3">
    <label class="form-label" for="password-confirm">Password Confirmation</label>
    <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
    @error('password-confirm')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div> --}}

{{-- NIP --}}
<div class="form-group mb-3">
    <label class="form-label" for="nip">NIP</label> <br>
    <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ Auth::user()->lecturers->nip  }}" required autocomplete="nip" placeholder="NIP" autofocus>

    @error('nip')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Name --}}
<div class="form-group mb-3">
    <label class="form-label" for="name">Nama</label> <br>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->lecturers->name  }}" required autocomplete="name" placeholder="Full Name" autofocus>

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Birth Place --}}
<div class="form-group mb-3">
    <label class="form-label" for="birthplace">Tempat Lahir</label> <br>
    <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ Auth::user()->lecturers->birthplace  }}" required autocomplete="birthplace" placeholder="Birth Place" autofocus>

    @error('birthplace')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Phone --}}
<div class="form-group mb-3">
    <label class="form-label" for="birthplace">Nomor Telepon</label> <br>
    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->lecturers->phone }}" required autocomplete="phone" placeholder="Phone" autofocus>

    @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Address --}}
<div class="form-group mb-3">
    <label class="form-label" for="address">Alamat</label>
    <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="address"
    value="{{ Auth::user()->lecturers->address }}"required autocomplete="address">

    @error('address')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
