{{-- @extends('layout.authentication.register') --}}
@extends('layout/main')

@section('page_name')
    <h1>Ubah Profile</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Ubah Profile' => '#'
        )
    )
  !!}
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card col-md-10">
        <div class="card-header">
            <h3 class="card-title">Ubah Profile</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form method="POST" action="{{ route('user-profile-information.update') }}">
                    @csrf
                    @method('PUT')

                    @if ( Auth::user()->isAdmin() )
                        @include('backend.user.include.admin_profile')
                    @elseif (Auth::user()->isStudent())
                        @include('backend.user.include.student_profile')
                    @elseif ( Auth::user()->isLecturer())
                        @include('backend.user.include.lecturer_profile')
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                Ubah
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

