<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='pegawai'   ){echo 'active';} ?>" href="<?= url('/admin/pegawai'); ?>">
            <i class="nav-icon fas fa-users"></i>  <p>Daftar Pegawai</p>
        </a>
    </li>
    <li class="nav-header">Talent Pool :: KINERJA / POTENSI </li>
    
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='ninebox'){echo 'active';} ?>" href="<?= url('/admin/ninebox'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Tabel Nine Box</p>
        </a>
    </li>
     
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='sebaran_ninebox' or Request::segment(2)=='sebaran_ninebox2'){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-table"></i>  <p>Peta Sebaran Nine Box <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
           
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='sebaran_ninebox' or Request::segment(2)=='adduseradmin'){echo 'active';} ?>" href="<?= url('/admin/sebaran_ninebox'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Peta Per OPD</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='sebaran_ninebox2' or Request::segment(2)=='addoperator' ){echo 'active';} ?>" href="<?= url('/admin/sebaran_ninebox2'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Peta Per Jabatan</p></a></li>
            

        </ul>
    </li>
    <li class="nav-header">Modul Suksesor </li>
    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='searchpegpotensi'   ){echo 'active';} ?>" href="<?= url('/admin/searchpegpotensi'); ?>">
            <i class="nav-icon fas fa-search"></i>  <p>Pencarian Pegawai Potensial</p>
        </a>
    </li> --}}
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='searchsuksesor'   ){echo 'active';} ?>" href="<?= url('/admin/searchsuksesor'); ?>">
            <i class="nav-icon fas fa-search"></i>  <p>Pencarian Suksesor</p>
        </a>
    </li>
    <li class="nav-header">Reports </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='grafikkompetensi'   ){echo 'active';} ?>" href="<?= url('/admin/grafikkompetensi'); ?>">
            <i class="nav-icon fas fa-chart-bar"></i>  <p>Grafik Kompetensi</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='rekapkompetensitalenta'   ){echo 'active';} ?>" href="<?= url('/admin/rekapkompetensitalenta'); ?>">
            <i class="nav-icon fas fa-list-alt"></i>  <p>Rekap Kompetensi Talenta</p>
        </a>
    </li>
    <li class="nav-header">Features</li>
     
     
    
     
     <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='changepass' ){echo 'active';} ?>" href="<?= url('/admin/changepass'); ?>">
            <i class="nav-icon fas fa-user"></i>  <p>Change Pass</p>
        </a>
    </li> 
     
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>  <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
