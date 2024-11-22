<option value="{{$pd->id}}" <?php if($selpd->id==$pd->id){echo"selected";}?> @if(@$params['idpd']==$pd->id) selected @endif>
    <?php 
        if($level!=0){
           
            for ($x = 1; $x <= $level; $x++){
                echo $strip;
            }
        }
             
        ?>
        {{-- {{ $pd->id }} --}}
         {{{ $pd->nama }}} :: {{ $pd->id }} </option> 


    <?php 
    $level++;
    $strip++;
    ?>
    <?php
    $subskpd=collect($allpd)->where(
            'id_induk',$pd->id)->where('status_aktif',1)->where('nama','!=','-');
    //        echo($subskpd);
    foreach($subskpd as $subPd) {  
    ?>
        @include('admin/sel-pd-ninebox',[
            'pd' => (object) $subPd,
        ])
    <?php
    }
     ?>