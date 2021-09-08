{{-- ISI SIDEBAR  --}}

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->


    @can('isAdmin')
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
                Admin
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            <li class="na-item">
                <a href="{{route('admin.users.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Kelola User
                  </p>
                </a>
            </li>
        </ul>

        <ul class="nav nav-treeview">
            <li class="na-item">
                <a href="{{route('admin.admins.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Kelola Admin
                  </p>
                </a>
            </li>
        </ul>

        <ul class="nav nav-treeview">
            <li class="na-item">
                <a href="{{route('admin.lecturers.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Kelola Dosen
                  </p>
                </a>
            </li>
        </ul>

        <ul class="nav nav-treeview">
            <li class="na-item">
                <a href="{{route('admin.students.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Kelola Mahasiswa
                  </p>
                </a>
            </li>
        </ul>
    </li>
    @endcan

    @can('isLecturer')
    <li class="nav-item">
      <a href="{{route('classrooms.index')}}?data=lecturer-data" class="nav-link">
        <i class="fas fa-chalkboard-teacher"></i>
        <p>
          Kelas
        </p>
      </a>
    </li>
    @endcan

  @can('isStudent')
    <li class="nav-item">
      <a href="{{route('classrooms.index')}}?data=student-data" class="nav-link">
        <i class="fas fa-chalkboard-teacher"></i>
        <p>
          Kelas
        </p>
      </a>
    </li>
    @endcan

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v1</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v2</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v3</p>
          </a>
        </li>
      </ul>
    </li>



</ul>
