<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='pegawai' or Request::segment(2)=='addpegawai' or Request::segment(2)=='editpegawai' ){echo 'active';} ?>" href="<?= url('/admin/pegawai'); ?>">
            <i class="nav-icon fas fa-users"></i>  <p>Data Pegawai</p>
        </a>
    </li>

    <!--
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='pendaftar' or Request::segment(2)=='pendaftarlkp' or Request::segment(2)=='pendaftarver' or Request::segment(2)=='pendaftarms' or Request::segment(2)=='pendaftartms'  or Request::segment(2)=='pendaftarbtl'){echo 'menu-open';} ?>">
        <a class="nav-link " href="#"><i class="nav-icon fa fa-users"></i>  <p>Data Pegawai <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview" style="<?php if(Request::segment(2)=='pendaftar' or Request::segment(2)=='pendaftarlkp' or Request::segment(2)=='pendaftarver' or Request::segment(2)=='pendaftarms' or Request::segment(2)=='pendaftartms'  or Request::segment(2)=='pendaftarbtl'){echo 'display:block';}else{echo 'display:none';} ?>">
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='pendaftar'){echo 'active';} ?>" href="<?= url('/admin/pendaftar'); ?>"><i class="nav-icon fa fa-circle"></i>  <p>Seluruh Pendaftar</p></a></li>
            
            <li class="nav-item has-treeview <?php if(Request::segment(2)=='pendaftarver' or Request::segment(2)=='pendaftarms' or Request::segment(2)=='pendaftartms'  or Request::segment(2)=='pendaftarbtl'){echo 'menu-open';} ?>"><a class="nav-link <?php if(Request::segment(2)=='pendaftarver' or Request::segment(2)=='pendaftarms' or Request::segment(2)=='pendaftartms' or Request::segment(2)=='pendaftarbtl' or Request::segment(2)=='pendaftarsapk'){echo 'active';} ?>" href="#"><i class="nav-icon fa  fa-arrow-circle-down"></i>  <p>Hasil Verifikasi <i class="right fa fa-angle-left"></i> </p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='pendaftarver'){echo 'active';} ?>" href="<?= url('/admin/pendaftarver'); ?>"><i class="nav-icon fa fa-angle-double-right"></i>  <p>Peserta Verifikasi</p></a></li>
                    <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='pendaftarms'){echo 'active';} ?>" href="<?= url('/admin/pendaftarms'); ?>"><i class="nav-icon fa fa-angle-double-right"></i>  <p>Pendaftar MS</p></a></li>
                    <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='pendaftartms'){echo 'active';} ?>" href="<?= url('/admin/pendaftartms'); ?>"><i class="nav-icon fa fa-angle-double-right"></i>  <p>Pendaftar TMS</p></a></li>
                    <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='pendaftarbtl'){echo 'active';} ?>" href="<?= url('/admin/pendaftarbtl'); ?>"><i class="nav-icon fa fa-angle-double-right"></i>  <p>Pendaftar BTL</p></a></li>
                    <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='pendaftarsapk'){echo 'active';} ?>" href="<?= url('/admin/pendaftarsapk'); ?>"><i class="nav-icon fa fa-angle-double-right"></i>  <p>Pendaftar sudah SAPK</p></a></li>
                </ul>
            </li>
        </ul>
    </li>
    !-->
    <li class="nav-header">UTILITAS</li>
     
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='users' or Request::segment(2)=='adduser' or Request::segment(2)=='pegawai' or Request::segment(2)=='editpel'){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-user"></i>  <p>Users <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
            <!--<li class="nav-item"><a class="nav-link " href="<?= url('/user/index?id_user_role=1'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Admin</p></a></li>
            !-->
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='users' or Request::segment(2)=='adduser'){echo 'active';} ?>" href="<?= url('/admin/users'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Administrator</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='peserta' or Request::segment(2)=='editpel' ){echo 'active';} ?>" href="<?= url('/admin/pegawai'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Pegawai</p></a></li>


        </ul>
    </li>
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='periode' or Request::segment(2)=='addperiode' or Request::segment(2)=='editperiode' or Request::segment(2)=='satker' or Request::segment(2)=='addsatker' or Request::segment(2)=='editsatker' or Request::segment(2)=='penilai' or Request::segment(2)=='addpenilai' or Request::segment(2)=='editpenilai' or Request::segment(2)=='atasan' or Request::segment(2)=='addatasan' or Request::segment(2)=='editatasan' ){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-wrench"></i>  <p>Referensi <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
           
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='periode' or Request::segment(2)=='addperiode'){echo 'active';} ?>" href="<?= url('/admin/periode'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Periode</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='satker' or Request::segment(2)=='addsatker'){echo 'active';} ?>" href="<?= url('/admin/satker'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Satuan Kerja (Satker)</p></a></li>
            
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='penilai' or Request::segment(2)=='addpenilai'){echo 'active';} ?>" href="<?= url('/admin/penilai'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Penilai</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='atasan' or Request::segment(2)=='addatasan'){echo 'active';} ?>" href="<?= url('/admin/atasan'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Atasan Penilai</p></a></li>


        </ul>
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
