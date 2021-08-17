
@extends('layout/main')


@section('page_name')
    <h1>Detail Kelas</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Kelas' => '#'
        )
    )
  !!}
@endsection

@section('content')
<style>
  .card-header ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
  }

  .card-header li {
      float: left;
      width: 100px;
  }

  .card-header li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
  }

  .card-header li a:hover:not(.active) {
      background-color: #111;
  }

  .card-header .active {
      background-color: #4CAF50;
  }
</style>
<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <div>
                <ul>
                  <li><a class="active" href="#home">Materi</a></li>
                  <li><a href="{{route('groups.members', $id)}}">Members</a></li>
                </ul>
            </div>
          </div>

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
@endsection

@section('javascripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </s>

    <script>
        function delete_lecturer($id) {
            event.preventDefault();
            if(confirm("Apakah anda ingin menghapus data ini?")){
                $("#delete-user-form-" + $id).submit();
            }
        }
    </script>
@endsection
