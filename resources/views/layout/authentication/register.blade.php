<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @yield('title')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="https://mdlc.herokuapp.com/assets/plugins/fontawesome-free/css/all.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  {{-- <link rel="stylesheet" href="https://mdlc.herokuapp.com/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="https://mdlc.herokuapp.com/assets/dist/css/adminlte.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">

<div class="register-box">

    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>GoBelajar</b>Asik</a>
      </div>
      <div class="card-body register-card-body">
        @yield('content')
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->

</div>
<!-- /.register-box -->

<!-- jQuery -->
{{-- <script src="https://mdlc.herokuapp.com/assets/plugins/jquery/jquery.min.js"></script> --}}
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
{{-- <script src="https://mdlc.herokuapp.com/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
{{-- <script src="https://mdlc.herokuapp.com/assets/dist/js/adminlte.min.js"></script> --}}
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
