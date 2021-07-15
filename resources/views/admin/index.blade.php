
@extends('layout/main')


@section('page_name')
    <h1>User Management</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!! 
    breadcrumb(
        array(
            'Dashboard' => url('/main'),
            'User Management' => '#'
        )
    )
  !!}
@endsection

@section('content')
    <div class="card">
        <h1>Admin Page</h1>
    </div>
@endsection

@section('jvascript')
    
@endsection
