<?php

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="{{url('/admin')}}" class="brand-link">
        <img src="{{ asset('/images/iconbabel.png') }}" alt="SILAPOR" class="brand-image img-circle elevation-3"
             style="opacity: .9">
        <span class="brand-text font-weight-bold"> SILAPOR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/images/user.jpeg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block" href="#">{{strtoupper($bio->nama)}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            
                @include('layouts.frontend.menu-op')
           
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
