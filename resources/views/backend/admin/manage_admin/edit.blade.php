@extends('layout/main')


@section('page_name')
    <h1>Kelola Mahasiswa</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Admin' => route('admin.admins.index'),
            'Edit Admin' => '#'
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

                <form method="POST" action="{{ route('admin.admins.update', $admin->id) }}">
                    @csrf
                    @method("PATCH")

                    @include('backend.admin.include.admin_form', ['edit' => true])

                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')

@endsection
