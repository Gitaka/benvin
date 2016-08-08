  @extends('staff.receivables')
  @section('receivable')

  <!--START PURCHASES -->

            <h3>Capital
                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/capitalReceivable')}}">Gen Excel</a>
                 </button>
            </h3>
         <div id="purchases" class="col-sm-12">
            <div id="purchases-header" class="col-sm-12">
                <div id="puchase-supplier" class="col-sm-2">
                   Shareholer
                </div>
                <div id="purchase-Email" class="col-sm-2">
                    Email
                </div>
                <div id="purchase-phone" class="col-sm-2">
                  TrackingNo
                </div>

                <div id="purchases-trackingNo" class="col-sm-2">
                 Total Capital
                </div>
                <div id="purchases-amountdue" class="col-sm-2">
                 Amount Received
                </div>
                 <div id="purchases-balance" class="col-sm-1">
                  Balance
                </div>
            </div>
            @foreach($capitals as $capital)
            <div id="purchases-details" class="col-sm-12">

            <div id="puchase-supplier" class="col-sm-2">
               {{$capital->shareholder}}
            </div>
            <div id="purchase-Email" class="col-sm-2">
                {{$capital->email}}
            </div>

            <div id="purchases-trackingNo" class="col-sm-2">
                {{$capital->trackingNo}}
            </div>
            <div id="purchases-amountdue" class="col-sm-2">
                 <button class="btn btn-primary btn-sm">KSH{{$capital->totalCapital}}</button>
            </div>
            <div id="purchases-amountdue" class="col-sm-2">
                 <button class="btn btn-primary btn-sm">KSH{{$capital->amountReceived}}</button>
            </div>

             <div id="purchases-balance" class="col-sm-1">
             
                <button class="btn btn-info btn-sm">KSH{{$capital->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $capitals->render(); ?>
         </div>

        <!--END PURCHASES-->


  @stop
  