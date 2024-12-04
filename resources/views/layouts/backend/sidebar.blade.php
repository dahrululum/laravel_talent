<?php
$leveluser=Auth::guard('admin')->user()->level;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        <img src="{{ asset('/images/logobabel.png') }}" alt="TalentPool" class="brand-image" >
        <span class="brand-text font-weight-bold">TalentPool </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/images/user.jpeg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block" href="#">{{ Auth::guard('admin')->user()->name }}   </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @if(Auth::guard('admin')->user()->level=="1") 
                @include('layouts.backend.menu-admin')
            
            @elseif(Auth::guard('admin')->user()->level=="2") 
                @include('layouts.backend.menu-op')
            @else
                @include('layouts.backend.menu-viewer')
            @endif
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
