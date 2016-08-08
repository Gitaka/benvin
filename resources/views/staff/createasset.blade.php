<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Benvin Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('panel/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="{{asset('panel/dist/css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('panel/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('panel/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav id="navbar"class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <!--<img class="img-rounded"src="{{asset('images/benvin-logo.jpg')}}" width="70" height="50">-->
            <div id="nav-header"class="navbar-header">
      
                <p class="navbar-brand">Benvin Solutions</p>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                  <li>
                            <a href="{{url('/staff')}}"><i class="fa fa-home fa-fw"></i>Home</a>
                 </li>
                <li>
                        <a href="{{url('/createinvoice')}}"><i class="fa fa-briefcase fa-fw"></i>Invoice</a>
                  </li>
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Debit Entries<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                          <a href="{{url('/createsalesentry')}}"><i class="fa fa-briefcase fa-fw"></i>Sale</a>
                        </li>
                         <li>
                          <a href="{{url('/createdebitassetentry')}}"><i class="fa fa-briefcase fa-fw"></i>Asset</a>
                        </li>
                         <li>
                          <a href="{{url('/createdebitliabilityentry')}}"><i class="fa fa-briefcase fa-fw"></i>Liability</a>
                        </li>
                         <li>
                          <a href="{{url('/createcapitalentry')}}"><i class="fa fa-briefcase fa-fw"></i>Capital</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Credit Entries<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                       <li>
                          <a href="{{url('/createpurchaseentry')}}"><i class="fa fa-briefcase fa-fw"></i>Purchase</a>
                        </li>
                      <li>
                          <a href="{{url('/creditassetentry')}}"><i class="fa fa-briefcase fa-fw"></i>Asset</a>
                        </li>
                        <li>
                          <a href="{{url('/creditliability')}}"><i class="fa fa-briefcase fa-fw"></i>Liability</a>
                        </li>
                        <li>
                          <a href="{{url('/creditexpenseentry')}}"><i class="fa fa-briefcase fa-fw"></i>Expense</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Account<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="{{url('/payable')}}">Payable</a>
                        </li>
                        <li class="divider"></li>
                       <li>
                            <a href="{{url('/receivable')}}">Receivable</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Statements<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                            <a href="{{url('/#')}}">BalanceSheet</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{url('/#')}}">Income Statement</a>
                                        </li>
                                        <li class="divider"></li>
                                    
                                        <li>
                                            <a href="{{url('/#')}}">Cash Flow Statement</a>
                                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Settings<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="{{url('auth/logout')}}">
                                SignOut
                            </a>
                        </li>
                        <li class="divider"></li>
              
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div id="sidebar" class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('/staff')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                        </li>
                          <li>
                            <a href="{{url('/clients')}}"><i class="fa fa-user fa-fw"></i>User Clients</a>
                        </li>
                       <li>
                            <a href="{{url('/staff/orders')}}"><i class="fa fa-file-excel-o fa-fw"></i>Orders</a>
                        </li>
                        <li>
                            <a href="{{url('/createproduct')}}"><i class="fa fa-barcode fa-fw"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{url('/tasks')}}"><i class="fa fa-tasks fa-fw"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="{{url('/chats')}}"><i class="fa fa-comment fa-fw"></i>Chats</a>
                        </li>
                        <li>
                            <a href="{{url('/reports')}}"><i class="fa fa-newspaper-o fa-fw"></i>Reports</a>
                        </li>
                        <li>
                            <a href="{{url('/note')}}"><i class="fa fa-pencil fa-fw"></i>Notes</a>
                        </li>
                       <li>
                            <a href="{{url('/createpost')}}"><i class="fa fa-upload fa-fw"></i>Create Post</a>
                        </li>
                        <li>
                            <a href="{{url('/posts')}}"><i class="fa fa-envelope fa-fw"></i>Blog</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Analysis</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
        <h2>Debit Assets
          <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/D_assestsExcel')}}">Gen Excel</a>
                 </button>

        </h2>
     <!--<button class="btn btn-info btn-block" id="assets-form-btn">Hide Create Assets Form</button>
         <div id="assets-deb"class="row">
           <div id="create-assets" class="col-sm-12">
                                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('createassetentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class=" control-label">Payment Mode</label>
                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>
                            <label class="control-label">Item</label>
                                <select id="item"name="item" class="form-control">
                                   
                                    <option name="cash">Fixed Asset</option>
                                    <option name="check">Debt</option>
                      
                                </select></br>

                                <input type="text" placeholder="Amount"id="amount"class="form-control" name="amount" value="{{ old('amount') }}"></br>
                                <input type="text"placeholder="Balance" id="balance" class="form-control" name="balance" value="{{ old('balance') }}"></br>

                            <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>
                
                                <input type="text" placeholder="Confirmation"id="code"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>

                              
                                <textarea  placeholder="Description" class="form-control"cols="50" rows="10" id="desc" name="description"></textarea></br>

                                <input type="text"  placeholder="Client"id="client"class="form-control" name="client" value="{{ old('client') }}"></br>

                                <input type="text"  placeholder="Email"id="email"class="form-control" name="email" value="{{ old('email') }}"></br>


                                <input type="text"  placeholder="PhobeNo"id="phone"class="form-control" name="phone" value="{{ old('phone') }}"></br>

            
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Asset
                                </button>
                            </div>
                        </div>
                    </form>
           </div>
        </div>-->
        <!--ASSET DEBIT  ENTRY-->

       <!-- <button class="btn btn-info btn-block" id="debit-assets-btn">Create Debit Asset Entry</button>-->
         <div class="row" id="debit-assets">
           <div class="col-sm-12">
              <div id="debit-assets-header" class="col-sm-12">
                  <div id="assets-receiptNo" class="col-sm-2">
                      TrackingNo
                    </div>
                    <div id="assets-item" class="col-sm-2">
                      Item
                   </div>
                   <div id="assets-client" class="col-sm-2">
                      Client
                   </div>
                   <div id="assets-description" class="col-sm-3">
                      Description
                   </div>
                   <div id="assets-amount" class="col-sm-2">
                      Amount
                   </div>
                   <div id="assets-balance" class="col-sm-1">
                     Balance
                   </div>
              </div>
              @foreach($assets as $asset)
              <div id="debit-assets-details">
                <div id="assets-receiptNo" class="col-sm-2">
                      {{$asset->trackingNo}}
                    </div>
                    <div id="assets-item" class="col-sm-2">
                      {{$asset->item}}
                   </div>
                   <div id="assets-client" class="col-sm-2">
                      {{$asset->client}}
                   </div>
                   <div id="assets-description" class="col-sm-3">
                      {{$asset->description}}
                   </div>
                   <div id="assets-amount" class="col-sm-2">
                      
                      <button class="btn btn-info btn-sm">KSH{{$asset->amount}}</button>
                   </div>
                   <div id="assets-balance" class="col-sm-1">
                      
                       <button class="btn btn-warning btn-sm">KSH{{$asset->balance}}</button>
                   </div>
              </div>
              @endforeach
            <?php echo $assets->render()?>
           </div>
         </div>


         </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('panel/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('panel/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
        <script type="text/javascript">
     $(document).ready(function(){
            $('#assets-form-btn').hide();
        $('#debit-assets-btn').click(function(){
              $('#assets-form-btn').show();
              $('#assets-deb').show();
              $('#debit-assets').hide();
               $('#debit-assets-btn').hide();
        });
        $('#assets-form-btn').click(function(){
            $('#debit-assets-btn').show();
            $('#assets-form-btn').hide();
            $('#assets-deb').hide();
            $('#debit-assets').show();

        });
     });
    </script>
    <script src="{{asset('panel/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>

