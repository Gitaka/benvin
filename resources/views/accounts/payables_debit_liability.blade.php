 @extends('staff.payables')
  @section('payable')
<!--START Liabilities -->

            <h3>Debit Liabilities
                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/DliabilityPayable')}}">Gen Excel</a>
                 </button>

            </h3>
         <div id="debit-liability" class="col-sm-12">
            <div id="debit-liability-header" class="col-sm-12">
                <div id="debit-liability-creditor" class="col-sm-2">
                 Creditor
                </div>
                <div id="debit-liability-desc" class="col-sm-3">
                  Description
                </div>
                <div id="debit-liablity-trackingNo" class="col-sm-2">
                  TrackingNo
                </div>
                <div id="debit-liability-principal" class="col-sm-2">
                 Principal
                </div>
                 <div id="debit-liabiltiy-interest" class="col-sm-1">
                 Interest
                </div>
                 <div id="debit-liabiltity-balance" class="col-sm-2">
                  Balance
                </div>
            </div>
            @foreach($debitPayables as $debitPayable)
            <div id="debit-liability-details" class="col-sm-12">

            <div id="debit-liability-creditor" class="col-sm-2">
               {{$debitPayable->creditor}}
            </div>
            <div id="debit-liability-desc" class="col-sm-3">
                {{$debitPayable->description}}
            </div>
           
            <div id="debit-liablity-trackingNo" class="col-sm-2">
                {{$debitPayable->trackingNo}}
            </div>
            <div id="debit-liability-principal" class="col-sm-2">
                <button class="btn btn-info btn-sm">KSH{{$debitPayable->amount}}</button>
            </div>
             <div id="debit-liabiltiy-interest" class="col-sm-1">
                <button class="btn btn-info btn-sm">{{$debitPayable->intrest}}</button>
            </div>
             <div id="debit-liabiltiy-balance" class="col-sm-2">
                <button class="btn btn-info btn-sm">KSH{{$debitPayable->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $debitPayables->render(); ?>
         </div>

        <!--END Debit Liabilities-->

  @stop