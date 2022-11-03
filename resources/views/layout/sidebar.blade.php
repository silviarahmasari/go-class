<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ URL::to('home') }}">GoClass</a>
    </div>

    <ul class="sidebar-menu">
      <li class="menu-header">M E N U</li>
        <li><a class="nav-link" href="{{ URL::to('Admin') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        <li><a class="nav-link" href="{{ URL::to('Users') }}"><i class="fas fa-user"></i> <span>Users</span></a></li>
      </li>
    </ul>
  </aside>
</div>