@extends('layout/main')


@section('page_name')
    <h1>Materi Belajar : {{$study->title}}</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
@can('isLecturer')
    {!!
        breadcrumb(
            array(
                'Dashboard' => route('home'),
                'Kelola Kelas' => url('classrooms?data=lecturer-data'),
                'Detail Kelas' => route('lecturer.classrooms.materi', $study->classroom->id),
                'Materi Belajar' => '#'
            )
        )
    !!}
@endcan

@can('isStudent')
    {!!
        breadcrumb(
            array(
                'Dashboard' => route('home'),
                'Kelola Kelas' => url('classrooms'),
                'Detail Kelas' => route('student.classrooms.materi', $study->classroom->id),
                'Materi Belajar' => '#'
            )
        )
    !!}
@endcan

@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>{{ $study->title }}</h3>
            </div>
            <div class="card-body">
                @if ($study->video_file != null)
                    <video width="360" height="280" controls>
                        <source src="{{ $study->video_file }}" type="video/mp4">
                        <source src="{{ $study->video_file }}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                @endif

                <br>

                @if ($study->audio_file != null)
                    <audio width="360" height="280" controls>
                        <source src="{{ $study->audio_file }}" type="audio/mpeg">
                        <source src="{{ $study->audio_file }}" type="audio/ogg">
                        Your browser does not support the video tag.
                    </audio>
                @endif

                  <br>
                  <br>

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
