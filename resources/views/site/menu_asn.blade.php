<?php 
$nav_nilai =  App\Models\CatNavigasi::Where('status','1')
                                ->where('alias','nilai')
                                ->first();
$nav_ind =  App\Models\CatNavigasi::Where('status','1')
                                ->where('alias','indikator')
                                ->first();
$nav_talent =  App\Models\CatNavigasi::Where('status','1')
                                ->where('alias','deskripsi-talenta')
                                ->first();
$nav_diagram =  App\Models\CatNavigasi::Where('status','1')
                                ->where('alias','diagram')
                                ->first();
$nav_komp =  App\Models\CatNavigasi::Where('status','1')
                                ->where('alias','deskripsi-kompetensi')
                                ->first();
$nav_saran =  App\Models\CatNavigasi::Where('status','1')
                                ->where('alias','saran')
                                ->first();
                                

//echo $nav_nilai;
?>
<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-header">Navigasi</li>
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/dashboard'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-header">Data Utama (Simadig)</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='biodata'  ){echo 'active';} ?>" href="<?= url('/biodata'); ?>">
            <i class="nav-icon fas fa-desktop"></i>  <p> Biodata</p>
        </a>
    </li>
    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='pemda'  ){echo 'active';} ?>" href="<?= url('/pemda'); ?>">
            <i class="nav-icon fa fa-desktop"></i>  <p> Administrasi Pemerintahan </p>
        </a>
    </li> --}}
    <li class="nav-header">Data Assessment</li>
    {{-- @if(!empty($nav_nilai))
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='nilai'  ){echo 'active';} ?>" href="<?= url('/nilai'); ?>">
            <i class="nav-icon fa fa-edit"></i>  <p>Hasil Assessment </p>
        </a>
    </li>
    @endif --}}
    @if(!empty($nav_nilai))
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='nilai'  ){echo 'active';} ?>" href="<?= url('/nilai'); ?>">
            <i class="nav-icon fa fa-edit"></i>  <p class="font-weight-bold h6"> Kotak Talenta  </p>
        </a>
    </li>
    @endif
    @if(!empty($nav_ind))
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='indikator'  ){echo 'active';} ?>" href="<?= url('/indikator'); ?>">
            <i class="nav-icon fa fa-edit"></i>  <p>Tabel Nilai Indikator Talenta </p>
        </a>
    </li>
    @endif
    @if(!empty($nav_talent))
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='boxtalenta'  ){echo 'active';} ?>" href="<?= url('/boxtalenta'); ?>">
            <i class="nav-icon fa fa-edit"></i>  <p>Deskripsi Kotak Talenta </p>
        </a>
    </li>
    @endif
    @if(!empty($nav_diagram))
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='webkomp'  ){echo 'active';} ?>" href="<?= url('/webkomp'); ?>">
            <i class="nav-icon fa fa-edit"></i>  <p>Diagram Jaring Laba-laba </p>
        </a>
    </li>
    @endif
    @if(!empty($nav_komp))
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='deskkomp'  ){echo 'active';} ?>" href="<?= url('/deskkomp'); ?>">
            <i class="nav-icon fa fa-edit"></i>  <p>Deskripsi Kompetensi </p>
        </a>
    </li>
    @endif
    @if(!empty($nav_saran))
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(1)=='saran'  ){echo 'active';} ?>" href="<?= url('/saran'); ?>">
            <i class="nav-icon fa fa-edit"></i>  <p>Saran Pengembangan </p>
        </a>
    </li>
    @endif

    <li class="nav-header">Keluar ?</li>
    <li class="nav-item ">
        <a class="nav-link" href="<?= url('/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>  <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
     
</ul>
