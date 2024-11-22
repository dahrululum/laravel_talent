<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
     
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='lapsi' ){echo 'active';} ?>" href="<?= url('/admin/lapsi'); ?>">
            <i class="nav-icon fas fa-database"></i>  <p>Laporan Aksi</p>
        </a>
    </li>

    <li class="nav-header">UTILITAS</li>
     
     
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>  <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
