<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link active" href="<?= url('/dashboard/unit'); ?>">
            <i class="nav-icon fa fa-dashboard"></i>  <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a class="nav-link" href="#">
            <i class="nav-icon fa fa-comment"></i> <p>e-Usulan <i class="right fa fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview" style="display: none">
            <li class="nav-item"><a class="nav-link " href="<?= url('/usulan-komponen/matriks'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Buat/Ubah Usulan</p></a></li>
            <li class="nav-item"><a class="nav-link " href="<?= url('/usulan-komponen/matriks-pdf'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Tayang/Cetak Usulan</p></a></li>
            <li class="nav-item"><a class="nav-link " href="<?= url('/usulan-usulan/view'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Kirim Usulan</p></a></li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a class="nav-link " href="#">
            <i class="nav-icon fa fa-file"></i>  <p>e-TOR <i class="right fa fa-angle-left"></i> </p>
        </a>
        <ul class="nav nav-treeview" style="display: none">
            <li class="nav-item"><a class="nav-link " href="<?= url('/usulan-komponen/index-tor'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Buat/Ubah TOR</p></a></li>
            <li class="nav-item"><a class="nav-link " href="<?= url('/usulan-komponen/index-tor-pdf'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Tayang/Cetak TOR</p></a></li>
            <li class="nav-item"><a class="nav-link " href="<?= url('/komponen/matriks-usulan'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Kirim TOR</p></a></li>
        </ul>
    </li>
    <li class="nav-item has-treeview"><a class="nav-link " href="#"><i class="nav-icon fa fa-dollar-sign"></i>  <p>e-RAB <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
            <li class="nav-item"><a class="nav-link " href="<?= url('/usulan-komponen/index-rab'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Buat/Ubah RAB</p></a></li>
            <li class="nav-item"><a class="nav-link " href="<?= url('/usulan-komponen/index-rab-pdf'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Tayang/Cetak RAB</p></a></li>
            <li class="nav-item"><a class="nav-link " href="<?= url('/komponen/matriks-usulan'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Kirim RAB</p></a></li>
        </ul>
    </li>
    <li class="nav-item"><a class="nav-link " href="#"><i class="nav-icon fa fa-edit"></i>  <p>e-Revisi</p></a></li>
    <li class="nav-header">LAIN-LAIN</li>
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-sign-out"></i>  <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
