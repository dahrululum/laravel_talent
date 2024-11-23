<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/penduduk'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='pengaduan' or Request::segment(2)=='addpengaduan' or Request::segment(2)=='editpengaduan' ){echo 'active';} ?>" href="<?= url('/penduduk/pengaduan'); ?>">
            <i class="nav-icon fas fa-users"></i>  <p>Data Aduan</p>
        </a>
    </li>

    <li class="nav-header">UTILITAS</li>
    <!--
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='changepass' or Request::segment(2)=='editbio'){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-user"></i>  <p>Biodata <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='editbio' ){echo 'active';} ?>" href="<?= url('/pegawai/editbio'); ?>"><i class="nav-icon fa fa-circle"></i>  <p>Detail Biodata</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='changepass' ){echo 'active';} ?>" href="<?= url('/pegawai/changepass'); ?>"><i class="nav-icon fa fa-circle"></i>  <p>Change Password</p></a></li>

        </ul>
    </li>
    !-->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/penduduk/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>  <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ url('/penduduk/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
