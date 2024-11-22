<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
    
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='veraduan' ){echo 'active';} ?>" href="<?= url('/admin/veraduan'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Data Verifikasi Aduan</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='sprint' ){echo 'active';} ?>" href="<?= url('/admin/sprint'); ?>">
            <i class="nav-icon fas fa-book"></i>  <p>SPRINT</p>
        </a>
    </li>
    <li class="nav-header">Report</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='rekap' ){echo 'active';} ?>" href="<?= url('/admin/rekap'); ?>">
            <i class="nav-icon fas fa-calendar"></i>  <p>Rekapitulasi </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='logver' ){echo 'active';} ?>" href="<?= url('/admin/logver'); ?>">
            <i class="nav-icon fas  fa-clock"></i>  <p>Log Verifikasi </p>
        </a>
    </li> 

    <li class="nav-header">UTILITAS</li>
     
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
