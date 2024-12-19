@extends('site.index_asn')

@section('content')
 
 <?php if ($message = Session::get('error')) { ?>
  <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong><?= $message ?></strong>
  </div>
<?php  } ?>

  <div class="row">
     

    <div class="col-lg-12 mb-2 mt-1">
      <div class="card">
              <div class="card-header">
                <div class="card-title"><h4 class=""> <b>SELAMAT DATANG, </b> {{ $bio->nama }}</h4></div>
              </div>
              <div class="card-body">
             

                 
                <div class="row mt-2 ">
                  <div class="col-lg-8 p-2">
                    {{-- <p>{{ $bio->detPeg }}</p> --}}
                    <div class="row border-bottom">
                      <div class="col-md-3 bg-info">Nama Lengkap</div>
                      <div class="col-md-9">{{ $bio->detPeg->NAMA }}</div>
                      
                    </div>
                    <div class="row border-bottom">
                      <div class="col-md-3 bg-info">NIP</div>
                      <div class="col-md-9">{{ $bio->detPeg->NIPBR }}</div>
                      
                    </div>
                    <div class="row border-bottom">
                      <div class="col-md-3 bg-info">Jabatan</div>
                      <div class="col-md-9">
                        @php
                         if(isset($bio->detPeg->JABATAN)){
                                        echo strtoupper($bio->detPeg->JABATAN);
                                    }else{
                                        echo"-";
                                    }  
                        @endphp
                      </div>
                      
                    </div>
                    <div class="row border-bottom">
                      <div class="col-md-3 bg-info">Instansi / Unit Kerja</div>
                      <div class="col-md-9">
                        @php
                        if(isset($bio->detPeg->Instansi)){
                                        echo strtoupper($bio->detPeg->Instansi);
                                    }else{
                                        echo"-";
                                    }
                        @endphp  
                      </div>
                      
                    </div>
                   
                      
                  </div>
                  <div class="col-lg-2 text-center bg-light">
                    <?php 
                       $urlfoto="https://simadig.babelprov.go.id/web/uploads/pegawai/berkas-foto/kecil/";

                    ?>
                    <img src="{{ $urlfoto.$bio->detPeg->Berkas_foto }}" class="img-box  " style="width:100px;" >
                  </div>

              </div>
              
               
               
            </div>
            <div class="card-footer">
              {{-- <div class="col-lg-4">
                <a href="{{url('/register')}}" class="btn btn-primary"><i class="fa fa-edit"></i> Registrasi</a>
                <a href="{{url('/login')}}" class="btn btn-info float-right"><i class="fa fa-key"></i> Login </a>
              </div>    --}}
            </div>
      </div>
      {{-- <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bookmarks</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-success">
            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-warning">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Events</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-danger">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Comments</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div> --}}
      {{-- <div class="card card-primary">
              <div class="card-body">
                <h3>{{ $bio->detSkp->nilai_skp }}</h3>
              </div>
               
      </div> --}}
        


    </div>
      
        


  </div>
  
   
    
 
@endsection
