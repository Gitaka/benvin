 @extends('staff.receivables')
  @section('receivable')
 <!--START Assets -->

            <h3>Assets
                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/assetsReceivable')}}">Gen Excel</a>
                 </button>
            </h3>
         <div id="assets" class="col-sm-12">
            <div id="assets-header" class="col-sm-12">
                     <div id="assets-receiver" class="col-sm-2">
                      Client
                    </div>

                    <div id="assets-desc" class="col-sm-3">
                      Description
                    </div>
                    <div id="assets-trackingNo" class="col-sm-2">
                      TrackingNo
                    </div>
                    <div id="assets-type" class="col-sm-2">
                    Item
                    </div>
                    <div id="assets-amount" class="col-sm-2">
                     Amount
                    </div>
                
                     <div id="assets-balance" class="col-sm-1">
                     Balance
                    </div>
            </div>
            @foreach($assets as $asset)
            <div id="assets-details" class="col-sm-12">

            <div id="assets-receiver" class="col-sm-2">
               {{$asset->client}}
            </div>

            <div id="assets-desc" class="col-sm-3">
                {{$asset->description}}
            </div>
            <div id="assets-trackingNo" class="col-sm-2">
                {{$asset->trackingNo}}
            </div>
            <div id="assets-type" class="col-sm-2">
               {{$asset->item}}
            </div>
            <div id="assets-amount" class="col-sm-2">
                <button class="btn btn-info btn-sm">KSH{{$asset->amount}}</button>
            </div>
        
             <div id="assets-balance" class="col-sm-1">
                <button class="btn btn-info btn-sm">KSH{{$asset->balance}}</button>
            </div>

            </div>
            @endforeach
             <?php echo $assets->render(); ?>
         </div>

        <!--END Assets-->
  @stop