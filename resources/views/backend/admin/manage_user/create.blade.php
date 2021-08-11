@extends('layout/main')


@section('page_name')
    <h1>User Management</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'kelola User' => route('admin.users.index'),
            'Tambah User' => '#'
        )
    )
  !!}
@endsection

@section('content')
    <!-- Default box -->
    <div class="card col-md-10">
        <div class="card-header">
          <h3 class="card-title">Menambahkan User</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    @include('backend.admin.include.form', ['create' => true])

                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')

@endsection
