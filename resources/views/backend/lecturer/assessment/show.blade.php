
@extends('layout/main')


@section('page_name')
    <h1>Kelola Penilaian</h1>
@endsection

@section('breadcrumb')
{{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
{!!
    breadcrumb(
        array(
            'Dashboard' => route('home'),
            'Kelola Penilaian' => '#'
        )
    )
  !!}
@endsection

@section('content')
<style>
  .card img{
    width:50%;
  }
</style>

<style>
  .card img{
    width:50%;
  }
</style>
<!--begin::Modal-->
<div class="modal fade" id="f_modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form method="POST" id="form_edit">
        @csrf
        @method('PATCH')
        <div class="modal-body">
          <div class="col-md-12">
            <div class="kt-form__group--inline">
              <div class="kt-form__label">
                <label class="kt-label m-label--single">Nilai:</label>
              </div>
              <div class="kt-form__control">
                <input id="score_update" type="number" max="100" class="form-control @error('score') is-invalid @enderror" name="score">
                <input id="id_update" type="hidden" class="form-control @error('score') is-invalid @enderror" name="id">
              </div>
            </div>
            <div class="d-md-none kt-margin-b-10"></div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="btn_form" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end::Modal-->

<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <div class="row">
                <h3 class="card-title ml-left col-lg-8">List Penilaian</h3>
            </div>
          </div>
          <div class="card-body">
            @foreach($details as $detail)
                <div class="row">
                    <div class="ml-left col-lg-1">
                        <h5>Soal</h5>
                    </div>
                    <div class="ml-left col-lg-9">
                        <p><i>({{$detail->score}} point)</i></p>
                    </div>
                    <div class="ml-right col-lg-2">
                        <a href="javascript:void(0)" onclick="assessment({{$detail->id}}, {{$detail->score}}, {{ $detail->score_id }})" class="btn btn-block btn-outline-info btn-sm">
                            <i class="far fa-plus-square"></i>
                            Beri Nilai
                        </a>
                    </div>
                </div>
                <p><?php
                echo nl2br($detail->question->text);
                ?></p>
                <h5>Jawaban</h5>
                <p><?php
                echo nl2br($detail->text);
                ?></p>
                <br>
            @endforeach
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
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script >
  function assessment(id, score) {
    $("#score_update").val(score).trigger('change');
    $("#id_update").val(id).trigger('change');
    $('#f_modal_edit').modal('show');
    var base = "{{url('/')}}";

  }
</script>
@endsection
