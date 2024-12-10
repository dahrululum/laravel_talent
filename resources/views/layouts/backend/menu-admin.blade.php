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
        <a class="nav-link <?php if(Request::segment(2)=='nipotinpres' or Request::segment(2)=='addnipotinpres' or Request::segment(2)=='editnipotinpres'  ){echo 'active';} ?>" href="<?= url('/admin/nipotinpres'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Nilai Kinerja Inovasi Prestasi</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='indikatorninebox' or Request::segment(2)=='addnipotinpres' or Request::segment(2)=='editnipotinpres'  ){echo 'active';} ?>" href="<?= url('/admin/indikatorninebox/1'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Nilai Indikator Nine Box</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='ninebox'){echo 'active';} ?>" href="<?= url('/admin/ninebox'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Tabel Nine Box</p>
        </a>
    </li>
    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='sebaran_ninebox'){echo 'active';} ?>" href="<?= url('/admin/sebaran_ninebox'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Peta Sebaran Nine Box</p>
        </a>
    </li> --}}
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
    <li class="nav-header">Assessment Center</li>
    <li class="nav-item ">
        <a class="nav-link" href="https://primadona.babelprov.go.id/assessment/admin/logintalent/{{ Auth::guard('admin')->user()->email }}" target="_blank" >
            <i class="nav-icon fas fa-table"></i>  <p>Modul Assessment</p>
        </a>
    </li>
    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='refkom' ){echo 'active';} ?>" href="<?= url('/admin/refkom'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Referensi Kompetensi Jabatan</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='standkom' ){echo 'active';} ?>" href="<?= url('/admin/standkom'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Standar Kompetensi Jabatan </p>
        </a>
    </li> --}}
    {{-- <li class="nav-header">Produk Ekraf</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='msvar' or Request::segment(2)=='addmsvar' or Request::segment(2)=='editmsvar' ){echo 'active';} ?>" href="<?= url('/admin/msvar'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Daftar Produk Ekraf</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='msvar_hasil' ){echo 'active';} ?>" href="<?= url('/admin/msvar_hasil'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Verifikasi Produk Ekraf</p>
        </a>
    </li>
     --}}
     
     
    
    @if(Auth::guard('admin')->user()->level=="1") 
    <li class="nav-header">UTILITAS</li>
    <li class="nav-item mt-1 "><a class="nav-link <?php if(Request::segment(2)=='navpeg' or Request::segment(2)=='editnavpeg'){echo 'active';} ?>" href="<?= url('/admin/navpeg'); ?>"><i class="nav-icon fa fa-table"></i>  <p>Navigasi Pegawai </p></a></li>

    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='getdatasimadig' ){echo 'active';} ?>" href="<?= url('/admin/getdatasimadig'); ?>">
            <i class="nav-icon fas fa-download"></i>  <p>GetData API Simadig</p>
        </a>
    </li> 
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='getdatakompetensi' ){echo 'active';} ?>" href="<?= url('/admin/getdatakompetensi'); ?>">
            <i class="nav-icon fas fa-download"></i>  <p>GetData Kompetensi JPM</p>
        </a>
    </li> 
    <!-- get indikatorbox per batch 22/11/2024 !-->
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='getdataindikatorbox' ){echo 'active';} ?>" href="<?= url('/admin/getdataindikatorbox'); ?>">
            <i class="nav-icon fas fa-download"></i>  <p>GetData Indikator Box / Batch</p>
        </a>
    </li> 

    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='instansi' or Request::segment(2)=='addinstansi' or Request::segment(2)=='editinstansi' ){echo 'active';} ?>" href="<?= url('/admin/instansi'); ?>">
            <i class="nav-icon fas fa-cubes"></i>  <p>Instansi </p>
        </a>
    </li>  --}}
    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='daerah' or Request::segment(2)=='adddaerah' or Request::segment(2)=='editdaerah' ){echo 'active';} ?>" href="<?= url('/admin/daerah'); ?>">
            <i class="nav-icon fas fa-cubes"></i>  <p>Daerah</p>
        </a>
    </li> 
     
    
    
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='about'){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-user"></i>  <p>Profil <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
           
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='about'){echo 'active';} ?>" href="<?= url('/admin/about'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Tentang Kami</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='bantuan' ){echo 'active';} ?>" href="<?= url('/admin/bantuan'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Bantuan</p></a></li>
            


        </ul>
    </li> --}}
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='useradmin' or Request::segment(2)=='adduseradmin' or Request::segment(2)=='operator' or Request::segment(2)=='addoperator' or Request::segment(2)=='editoperator'){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-user"></i>  <p>Users <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
           
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='useradmin' or Request::segment(2)=='adduseradmin'){echo 'active';} ?>" href="<?= url('/admin/useradmin'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Administrator</p></a></li>
            {{-- <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='operator' or Request::segment(2)=='addoperator' ){echo 'active';} ?>" href="<?= url('/admin/operator'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Operator</p></a></li> --}}
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='viewer' or Request::segment(2)=='addviewer' ){echo 'active';} ?>" href="<?= url('/admin/viewer'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Viewer/Pimpinan</p></a></li>


        </ul>
    </li>

     @endif
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
