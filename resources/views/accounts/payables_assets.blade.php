  @extends('staff.payables')
  @section('payable')
          <!--START Assets -->

            <h3>Assets

                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/assetsPayable')}}">Gen Excel</a>
                 </button>
            </h3>
         <div id="assets" class="col-sm-12">
            <div id="assets-header" class="col-sm-12">
                     <div id="assets-receiver" class="col-sm-2">
                      Receiver
                    </div>
                    <div id="assets-email" class="col-sm-2">
                      Email
                    </div>
                    <div id="assets-desc" class="col-sm-2">
                      Description
                    </div>
                    <div id="assets-trackingNo" class="col-sm-2">
                      TrackingNo
                    </div>
                    <div id="assets-type" class="col-sm-1">
                    Type
                    </div>
                    <div id="assets-amount" class="col-sm-2">
                     Amount
                    </div>
                
                     <div id="assets-balance" class="col-sm-1">
                     Balance
                    </div>
            </div>
            @foreach($assetsPayables as $assetPayable)
            <div id="assets-details" class="col-sm-12">

            <div id="assets-receiver" class="col-sm-2">
               {{$assetPayable->receiver}}
            </div>
            <div id="assets-email" class="col-sm-2">
                {{$assetPayable->email}}
            </div>
            <div id="assets-desc" class="col-sm-2">
                {{$assetPayable->description}}
            </div>
            <div id="assets-trackingNo" class="col-sm-2">
                {{$assetPayable->trackingNo}}
            </div>
            <div id="assets-type" class="col-sm-1">
               {{$assetPayable->type}}
            </div>
            <div id="assets-amount" class="col-sm-2">
                <button class="btn btn-info btn-sm">KSH{{$assetPayable->amount}}</button>
            </div>
        
             <div id="assets-balance" class="col-sm-1">
                <button class="btn btn-info btn-sm">KSH{{$assetPayable->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $assetsPayables->render(); ?>
         </div>

        <!--END Assets-->
  @stop