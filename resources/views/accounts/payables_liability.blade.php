   @extends('staff.payables')
  @section('payable')
  <!--START Liabilities -->
 
            <h3>Liabilities

                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/liabilityPayable')}}">Gen Excel</a>
                 </button>
            </h3>
         <div id="liability" class="col-sm-12">
            <div id="liability-header" class="col-sm-12">
                <div id="liability-creditor" class="col-sm-1">
                 Creditor
                </div>
                <div id="liability-desc" class="col-sm-3">
                  Description
                </div>
                <div id="liability-type" class="col-sm-2">
                  Type
                </div>
                <div id="liablity-trackingNo" class="col-sm-2">
                  TrackingNo
                </div>
                <div id="liability-principal" class="col-sm-2">
                 Principal
                </div>
                 <div id="liabilti-interest" class="col-sm-1">
                 Interest
                </div>
                 <div id="liabilti-balance" class="col-sm-1">
                  Balance
                </div>
            </div>
            @foreach($liabilitiesPayables as $liabilityPayable)
            <div id="liability-details" class="col-sm-12">

            <div id="liability-creditor" class="col-sm-1">
               {{$liabilityPayable->creditor}}
            </div>
            <div id="liability-desc" class="col-sm-3">
                {{$liabilityPayable->description}}
            </div>
            <div id="liability-type" class="col-sm-2">
                {{$liabilityPayable->type}}
            </div>
            <div id="liablity-trackingNo" class="col-sm-2">
                {{$liabilityPayable->trackingNo}}
            </div>
            <div id="liability-principal" class="col-sm-2">
                <button class="btn btn-info btn-sm">KSH{{$liabilityPayable->principal}}</button>&nbsp;&nbsp;
                &nbsp;&nbsp;
            </div>
             <div id="liabilti-interest" class="col-sm-1">
                <button class="btn btn-info btn-sm">{{$liabilityPayable->intrest}}</button>
            </div>
             <div id="liabilti-balance" class="col-sm-1">
                <button class="btn btn-info btn-sm">KSH{{$liabilityPayable->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $liabilitiesPayables->render(); ?>
         </div>

        <!--END Liabilities-->
  @stop