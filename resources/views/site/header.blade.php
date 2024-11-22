<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top border-bottom">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('/images/logoprimadona.png') }}" alt="" class="brand-image " style="opacity: .9">
    </a>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item  small active">
        <a class="nav-link" href="{{url('/')}}"><i class="nav-icon fas  fa-home"></i> Beranda <span class="sr-only">(current)</span></a>
      </li>
      {{-- <li class="nav-item small">
        <a class="nav-link" href="{{url('/aboutus')}}"><i class="nav-icon fas  fa-users"></i> Tentang Kami</a>
      </li>
     
      <li class="nav-item small">
        <a class="nav-link" href="{{url('/helpdesk')}}"><i class="nav-icon fas fa-tty"></i> Bantuan </a>
      </li> --}}
    </ul>
    
  </div>
</nav>