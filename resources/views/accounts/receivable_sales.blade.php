  @extends('staff.receivables')
  @section('receivable')

  <!--START PURCHASES -->

            <h3>Sales
                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/salesReceivable')}}">Gen Excel</a>
                 </button>
            </h3>
         <div id="purchases" class="col-sm-12">
            <div id="purchases-header" class="col-sm-12">
                <div id="puchase-supplier" class="col-sm-2">
                   Supplier
                </div>
                <div id="purchase-Email" class="col-sm-2">
                    Email
                </div>
                <div id="purchase-phone" class="col-sm-3">
                   Description
                </div>

                <div id="purchases-trackingNo" class="col-sm-2">
                 ReceiptNo
                </div>
                <div id="purchases-amountdue" class="col-sm-1">
                 Amount
                </div>

                 <div id="purchases-balance" class="col-sm-1">
                  Balance
                </div>
            </div>
            @foreach($sales as $sale)
            <div id="purchases-details" class="col-sm-12">

            <div id="puchase-supplier" class="col-sm-2">
               {{$sale->client}}
            </div>
            <div id="purchase-Email" class="col-sm-2">
                {{$sale->email}}
            </div>
            <div id="purchases-trackingNo" class="col-sm-3">
                {{$sale->description}}
            </div>
            <div id="purchases-trackingNo" class="col-sm-2">
                {{$sale->receiptNo}}
            </div>
            <div id="purchases-amountdue" class="col-sm-1">
                 <button class="btn btn-primary btn-sm">KSH{{$sale->amountCharged}}</button>
            </div>

             <div id="purchases-balance" class="col-sm-1">
             
                <button class="btn btn-info btn-sm">KSH{{$sale->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $sales->render(); ?>
         </div>

        <!--END PURCHASES-->


  @stop
  