<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="{{route('user.profile')}}" class="d-block">{{ Auth::user()->username }}</a>
    </div>
  </div>
