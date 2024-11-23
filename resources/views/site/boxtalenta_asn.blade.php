@extends('site.index_asn')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
    <strong>{{ $message }}</strong>
</div>
 
 @endif
<div class=" ">
    <div class="row justify-content-center p-1">
                
            <div class="col-md-12">
                <div class="card card-info ">
                     
                    <div class="card-body border-top">
                         
                        <div class="">
                            <div class="h5 text-center text-dark">
                                Deskripsi Kotak Talenta
                            </div>
                            
                        </div>  
                            
                        <div class="row mt-3 border-top p-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="font-weight-bold text-center h4 ">{{ $indi->nilai_tb }} </th>
                                           
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                        <tr>
                                             
                                            <td class="font-weight-normal text-center ">{{ $indi->uraian_tb }} </td>
                                            
                                        </tr>
                                      
                                    </tbody>
    
                                </table>
                            </div>
                            

                        </div>                    
                        
                    </div>
                     
                     
                     
                    <div class="card-footer">
                      <p>
                         
                        <b>Email :</b>  bkpsdmd@babelprov.go.id <br> <b>Website :</b>  bkpsdmd.babelprov@go.id
                      </p>
                      
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
 