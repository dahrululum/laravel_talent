<div class="content-wrapper">
    <section class="content-header">
        <!--
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1> <?= Request::segment(2) ?></h1>
                </div>
            </div>
        </div>
        !-->
        @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
          <strong>{{ $message }}</strong>
      </div>
	   
       @endif

    </section>

    <section class="content" id="content">
        @yield('content')
    </section>

</div>
