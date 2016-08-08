 @extends('staff.receivables')
 @section('receivable')
<!--START Liabilities -->

            <h3>Debit Liabilities
                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/liabilityReceivable')}}">Gen Excel</a>
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
            @foreach($liabilities as $liability)
            <div id="debit-liability-details" class="col-sm-12">

            <div id="debit-liability-creditor" class="col-sm-2">
               {{$liability->creditor}}
            </div>
            <div id="debit-liability-desc" class="col-sm-3">
                {{$liability->description}}
            </div>
           
            <div id="debit-liablity-trackingNo" class="col-sm-2">
                {{$liability->trackingNo}}
            </div>
            <div id="debit-liability-principal" class="col-sm-2">
                <button class="btn btn-info btn-sm">KSH{{$liability->amount}}</button>
            </div>
             <div id="debit-liabiltiy-interest" class="col-sm-1">
                <button class="btn btn-info btn-sm">{{$liability->intrest}}</button>
            </div>
             <div id="debit-liabiltiy-balance" class="col-sm-2">
                <button class="btn btn-info btn-sm">KSH{{$liability->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $liabilities->render(); ?>
         </div>

        <!--END Debit Liabilities-->


 @stop