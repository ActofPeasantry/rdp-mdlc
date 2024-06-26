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
                'Detail Kelas' => route('lecturer.classrooms.materi',$classroom->id),
                'Edit Materi' => '#'
            )
        )
    !!}
@endcan

@endsection

@section('content')
    <!-- Default box -->
    <div class="card col-md-10">
        <div class="card-header">
          <h3 class="card-title">Menambahkan Materi Belajar</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <form method="POST" action="{{ route('lecturer.materials.update', [$study->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    @include('backend.lecturer.include.study_form', ['edit' => true])

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
