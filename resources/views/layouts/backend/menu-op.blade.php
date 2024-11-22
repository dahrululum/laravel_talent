<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-header">Survei SKM</li>
    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(3)=='publik' or Request::segment(3)=='1' ){echo 'active';} ?>" href="<?= url('/admin/layanan/publik'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Create</p>
        </a>
    </li> --}}
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='mastersurvei' or Request::segment(2)=='addmastersurvei' or Request::segment(2)=='editmastersurvei' or Request::segment(2)=='soalsurvei' or Request::segment(2)=='addsoalsurvei' or Request::segment(2)=='editsoalsurvei' or Request::segment(2)=='addpilsoalsurvei' or Request::segment(2)=='editpilsoalsurvei'){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-calendar"></i>  <p>Create Survei <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
            
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='mastersurvei' or Request::segment(2)=='addmastersurvei' or Request::segment(2)=='editmastersurvei' ){echo 'active';} ?>" href="<?= url('/admin/mastersurvei/1'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Master Survei</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='soalsurvei' or Request::segment(2)=='addsoalsurvei' or Request::segment(2)=='editsoalsurvei' or Request::segment(2)=='addpilsoalsurvei' or Request::segment(2)=='editpilsoalsurvei' ){echo 'active';} ?>" href="<?= url('/admin/soalsurvei/1'); ?>"><i class="far fa-circle nav-icon"></i>  <p> Soal & Pil. Jawaban</p></a></li>
            {{-- <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='jawabansurvei' or Request::segment(2)=='addjawabansurvei' or Request::segment(2)=='editjawabansurvei' ){echo 'active';} ?>" href="<?= url('/admin/jawabansurvei'); ?>"><i class="far fa-circle nav-icon"></i>  <p> Pilihan Jawaban</p> <span class="badge badge-info">khusus PG</span></a></li> --}}


        </ul>
    </li>
    
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='postingskm' ){echo 'active';} ?>" href="<?= url('/admin/postingskm'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Posting</p>
        </a>
    </li>
     
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='rawdata' or Request::segment(2)=='verrawdata' or Request::segment(2)=='viewrawdata' or Request::segment(2)=='editrawdata'  ){echo 'active';} ?>" href="<?= url('/admin/rawdata'); ?>">
            <i class="nav-icon fas fa-table"></i><p>Raw Data </p>
        </a>
    </li>
    <li class="nav-header">Pengolahan Data SKM</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='analisa' or Request::segment(2)=='veranalisa'  ){echo 'active';} ?>" href="<?= url('/admin/analisa'); ?>">
            <i class="nav-icon fas fa-table"></i><p>Analisis Data </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='hasilanalisa'  ){echo 'active';} ?>" href="<?= url('/admin/hasilanalisa'); ?>">
            <i class="nav-icon fas fa-table"></i><p>Hasil Analisis </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='portal' or Request::segment(2)=='addportal' or Request::segment(2)=='editportal' ){echo 'active';} ?>" href="<?= url('/admin/portal'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Report </p>
        </a>
    </li>
    <li class="nav-header">Survei Non SKM</li>
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='mastersurvei_ns' or Request::segment(2)=='addmastersurvei_ns' or Request::segment(2)=='editmastersurvei_ns' or Request::segment(2)=='sectionsurvei_ns' or Request::segment(2)=='soalsurvei_ns'  or Request::segment(2)=='addsoalsurvei_ns' or Request::segment(2)=='editsoalsurvei_ns' or Request::segment(2)=='addpilsoalsurvei_ns' or Request::segment(2)=='editpilsoalsurvei_ns' or Request::segment(2)=='responden_ns' or Request::segment(2)=='addresponden_ns' or Request::segment(2)=='editresponden_ns' or Request::segment(2)=='addpilresponden_ns' or Request::segment(2)=='editpilresponden_ns' ){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-calendar"></i>  <p>Create Survei  <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
            
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='mastersurvei_ns' or Request::segment(2)=='addmastersurvei_ns' or Request::segment(2)=='editmastersurvei_ns' ){echo 'active';} ?>" href="<?= url('/admin/mastersurvei_ns/2'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Master Survei</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='sectionsurvei_ns' or Request::segment(2)=='addresponden_ns' or Request::segment(2)=='editresponden_ns' or Request::segment(2)=='addpilresponden_ns' or Request::segment(2)=='editpilresponden_ns' ){echo 'active';} ?>" href="<?= url('/admin/sectionsurvei_ns'); ?>"><i class="far fa-circle nav-icon"></i>  <p> Section</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='soalsurvei_ns' or Request::segment(2)=='addsoalsurvei_ns' or Request::segment(2)=='editsoalsurvei_ns' or Request::segment(2)=='addpilsoalsurvei_ns' or Request::segment(2)=='editpilsoalsurvei_ns' ){echo 'active';} ?>" href="<?= url('/admin/soalsurvei_ns/2'); ?>"><i class="far fa-circle nav-icon"></i>  <p> Soal & Pil. Jawaban</p></a></li>
            {{-- <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='jawabansurvei' or Request::segment(2)=='addjawabansurvei' or Request::segment(2)=='editjawabansurvei' ){echo 'active';} ?>" href="<?= url('/admin/jawabansurvei'); ?>"><i class="far fa-circle nav-icon"></i>  <p> Pilihan Jawaban</p> <span class="badge badge-info">khusus PG</span></a></li> --}}

        </ul>
    </li>

    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='postingnonskm' ){echo 'active';} ?>" href="<?= url('/admin/postingnonskm'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Posting</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='rawdatanonskm' or Request::segment(2)=='viewrawdatanonskm' or Request::segment(2)=='viewrawdatanonskm2' or Request::segment(2)=='editrawdatarawdatanonskm'  ){echo 'active';} ?>" href="<?= url('/admin/rawdatanonskm'); ?>">
            <i class="nav-icon fas fa-table"></i><p>Raw Data</p>
        </a>
    </li>
    <li class="nav-header">Pengolahan Data Non SKM</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='reportnoskm'  ){echo 'active';} ?>" href="<?= url('/admin/reportnoskm'); ?>">
            <i class="nav-icon fas fa-table"></i><p>Periodesasi</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='rekapnoskm'  ){echo 'active';} ?>" href="<?= url('/admin/rekapnoskm'); ?>">
            <i class="nav-icon fas fa-table"></i><p>Hasil Periodesasi</p>
        </a>
    </li>
    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='postingnonskm' ){echo 'active';} ?>" href="<?= url('/admin/postingnonskm'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Posting</p>
        </a>
    </li>
     --}}
    <li class="nav-header">UTILITAS</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='changepass' ){echo 'active';} ?>" href="<?= url('/admin/changepass'); ?>">
            <i class="nav-icon fas fa-user"></i>  <p>Change Password</p>
        </a>
    </li> 
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='doc-api' ){echo 'active';} ?>" href="<?= url('/admin/doc-api'); ?>">
            <i class="nav-icon fas fa-code"></i>  <p>Dokumentasi Rest-API </p>
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
