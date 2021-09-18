@extends('layout/main')


@section('page_name')
    <h1>Kelola Dosen</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Dosen' => route('admin.lecturers.index'),
            'Tambah Dosen' => '#'
        )
    )
  !!}
@endsection

@section('content')
    <!-- Default box -->
    <div class="card col-md-10">
        <div class="card-header">
          <h3 class="card-title">Masuk Kelas</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" action="{{ route('student.classrooms.storeJoin') }}">
                    @csrf
                    {{-- Name --}}
                    <div class="form-group mb-3">
                        <label class="form-label" for="code">Kode Kelas</label>
                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                        required autocomplete="code">

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
                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')

@endsection
