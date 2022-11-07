<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ URL::to('dashboard') }}">GoClass</a>
    </div>

    <ul class="sidebar-menu">
      <li class="menu-header">M E N U</li>
        <li><a class="nav-link" href="{{ route('classes.index') }}"><i class="fas fa-book"></i> <span>Mata Kuliah</span></a></li>
        {{-- <li><a class="nav-link" href="{{ URL::to('/users') }}"><i class="fas fa-user"></i> <span>Users</span></a></li> --}}
      </li>
    </ul>
  </aside>
</div>