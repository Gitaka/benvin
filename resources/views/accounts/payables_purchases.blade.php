 
  @extends('staff.payables')
  @section('payable')

  
        <!--START PURCHASES -->
         <div class="row" id="row-purchases">
            <h3>Purchases
                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/purchasePayable')}}">Gen Excel</a>
                 </button>
            </h3>
         <div id="purchases" class="col-sm-12">
            <div id="purchases-header" class="col-sm-12">
                <div id="puchase-supplier" class="col-sm-2">
                   Supplier
                </div>
                <div id="purchase-Email" class="col-sm-3">
                    Email
                </div>
                <div id="purchase-phone" class="col-sm-2">
                   PhoneNo
                </div>
                <div id="purchase-type" class="col-sm-1">
                 Type
                </div>
                <div id="purchases-trackingNo" class="col-sm-2">
                 TrackingNo
                </div>
                <div id="purchases-amountdue" class="col-sm-1">
                 AmountDue
                </div>

                 <div id="purchases-balance" class="col-sm-1">
                  Balance
                </div>
            </div>
            @foreach($purchasesPayables as $purchasePayable)
            <div id="purchases-details" class="col-sm-12">

            <div id="puchase-supplier" class="col-sm-2">
               {{$purchasePayable->supplier}}
            </div>
            <div id="purchase-Email" class="col-sm-3">
                {{$purchasePayable->email}}
            </div>
            <div id="purchase-phone" class="col-sm-2">
                {{$purchasePayable->phone}}
            </div>
            <div id="purchase-type" class="col-sm-1">
                {{$purchasePayable->type}}
            </div>
            <div id="purchases-trackingNo" class="col-sm-2">
                {{$purchasePayable->trackingNo}}
            </div>
            <div id="purchases-amountdue" class="col-sm-1">
               
                 <button class="btn btn-primary btn-sm">KSH{{$purchasePayable->amountDue}}</button>
            </div>

             <div id="purchases-balance" class="col-sm-1">
             
                <button class="btn btn-info btn-sm">KSH{{$purchasePayable->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $purchasesPayables->render(); ?>
         </div>
        </div>
        <!--END PURCHASES-->
  @stop