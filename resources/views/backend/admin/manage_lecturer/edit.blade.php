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
            'Edit Dosen' => '#'
        )
    )
  !!}
@endsection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" action="{{ route('admin.lecturers.update', $lecturer->id) }}">
                    @csrf
                    @method("PATCH")

                    @include('backend.admin.include.lecturer_form', ['edit' => true])

                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')

@endsection
