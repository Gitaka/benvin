 @extends('staff.payables')
  @section('payable')
            
        <!--START Expenses -->
       
            <h3>Expenses

                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/expensesPayable')}}">Gen Excel</a>
                 </button>
            </h3>
         <div id="expenses" class="col-sm-12">
            <div id="expenses-header" class="col-sm-12">
                  <div id="expenses-department" class="col-sm-2">
                     Department
                    </div>
                    <div id="expenses-desc" class="col-sm-3">
                      Description
                    </div>
                    <div id="expenses-paidto" class="col-sm-2">
                     Paid To
                    </div>
                    <div id="expenses-trackingNo" class="col-sm-2">
                     TrackingNo
                    </div>
                    <div id="purchases-amount" class="col-sm-2">
                     Amount
                    </div>
                
                     <div id="expenses-balance" class="col-sm-1">
                     Balance
                    </div>
            </div>
            @foreach($expensesPayables as $expensePayable)
            <div id="expenses-details" class="col-sm-12">

            <div id="expenses-department" class="col-sm-2">
               {{$expensePayable->department}}
            </div>
            <div id="expenses-desc" class="col-sm-3">
                {{$expensePayable->description}}
            </div>
            <div id="expenses-paidto" class="col-sm-2">
                {{$expensePayable->paidto}}
            </div>
            <div id="expenses-trackingNo" class="col-sm-2">
                {{$expensePayable->trackingNo}}
            </div>
            <div id="purchases-amount" class="col-sm-2">
                <button class="btn btn-info btn-sm">KSH{{$expensePayable->amount}}</button>
            </div>
        
             <div id="expenses-balance" class="col-sm-1">
                <button class="btn btn-info btn-sm">KSH{{$expensePayable->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $expensesPayables->render(); ?>
         </div>
       
        <!--END Expenses-->
  @stop