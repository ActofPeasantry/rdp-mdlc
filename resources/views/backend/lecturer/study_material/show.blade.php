@extends('layout/main')


@section('page_name')
    <h1>Materi Belajar : {{$study->title}}</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Kelas' => route('lecturer.classrooms.index'),
            'Detail Kelas' => '#',
            'Materi Belajar' => '#'
        )
    )
  !!}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>{{ $study->title }}</h3>
            </div>
            <div class="card-body">
                <input type="hidden" id="material-description" value="{{ $study->description }}">
                <div id="description" name="description" class=""></div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        var $log = $( "#description"),
        str = $( "#material-description" ).val(),
        html = $.parseHTML( str ),
        nodeNames = [];

        // Append the parsed HTML
        $log.append( html );
    </script>
@endsection
