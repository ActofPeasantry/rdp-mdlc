<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('home')}}" class="nav-link">Home</a>
    </li>
</ul>

<ul class="navbar-nav ml-auto">
  @if(Route::has('login'))
    @auth
      <li class="nav-item">
          <a href="" class="nav-link" onclick="logout()">logout</a>
      </li>
      <form id="logout-form" action="{{route('logout')}}" method="POST">@csrf</form>
    @else
      <li class="nav-item">
          <a href="{{route('login')}}" class="nav-link">login</a>
      </li>
      <li class="nav-item">
          <a href="{{route('register')}}" class="nav-link">register</a>
      </li>
    @endif
  @endif
</ul>
