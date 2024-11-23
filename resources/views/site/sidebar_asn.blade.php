<?php

?>
<aside class="main-sidebar elevation-4 sidebar-dark-indigo">
    <!-- Brand Logo -->
    <a href="{{url('/admin')}}" class="brand-link text-sm navbar-navy">
        <img src="{{ asset('/images/iconbabel.png') }}" alt="SPBE" class="brand-image img-circle elevation-3"
             style="opacity: .9">
        <span class="brand-text font-weight-bold"> PRIMADONA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/images/logobabel.png') }}" class="img-box" alt="User Image">
            </div>
            <div class="info">
                 
            </div>
        </div> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            
                @include('site.menu_asn')
           
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
