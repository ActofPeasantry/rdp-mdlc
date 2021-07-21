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
            'User Management' => route('admin.users.index'),
            'Edit User' => '#'
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
          {{$user->id}}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
@endsection

@section('javascripts')

@endsection
