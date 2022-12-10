<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ URL::to('dashboard') }}">GoClass</a>
    </div>

    <ul class="sidebar-menu">
      <li><a class="nav-link" href="{{ route('classes.index') }}"><i class="fas fa-home"></i> <span>Kelas</span></a></li>
      <li class="menu-header">Mengajar</li>
        <li><a class="nav-link" href="{{ route('classes.index') }}"><i class="fas fa-book"></i> <span>Mata Kuliah</span></a></li>
      </li>
      <li class="menu-header">Terdaftar</li>
        <li><a class="nav-link" href="{{ route('classes.index') }}"><i class="fas fa-book"></i> <span>Mata Kuliah</span></a></li>
      </li>
    </ul>
  </aside>
</div>