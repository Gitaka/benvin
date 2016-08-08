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

         <h2>Debit Capital
                <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/capitalExcel')}}">Gen Excel</a>
                 </button>
         </h2>
       <!-- <button style="display:none;"class="btn btn-info btn-block" id="capital-form-btn">Hide Create Capital Form</button>
         <div class="row"  id="deb-capital">
          <div id="create-capital" class="col-sm-12">
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('createcapitalentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">
                     <label class="control-label">Payment Mode</label>
                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>

                                <input type="text" placeholder="Total Capital"class="form-control" name="totalCapital" value="{{ old('totalCapital') }}"></br>

                                <input type="text"  placeholder="Amount"id="amount"class="form-control" name="amount" value="{{ old('amount') }}"></br>

                                <input type="text"  placeholder="Balance"id="balance"class="form-control" name="balance" value="{{ old('balance') }}"></br>

                            <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>

                                <input type="text" id="code"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>

                                <input type="text" placeholder="Shareholder" class="form-control" name="shareHolder" value="{{ old('shareHolder') }}"></br>

                                <input type="text" placeholder="Email" id="email"class="form-control" name="email" value="{{ old('email') }}"></br>

                                <input type="text" placeholder="PhoneNo" class="form-control" name="phone" value="{{ old('phone') }}"></br>
            
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Capital
                                </button>
                            </div>
                        </div>
                    </form>
          </div>
         </div>-->
     <!--END CAPITAL ADD FORM
        <button class="btn btn-info btn-block" id="debit-capital-btn">Create Debit Capital Entry</button>-->
         <div id="debit-capital" class="row">

           <div id="debit-capital-header"class="col-sm-12">
             <div class="col-sm-2">Shareholder</div>
              <div class="col-sm-2">TrackingNo</div>
              <div class="col-sm-2">Total Capital</div>
              <div class="col-sm-2">Amount Received</div>
              <div class="col-sm-2">
               Balance
              </div>
           </div>
           @foreach($capitals as $capital)
           <div id="debit-capital-details" class="col-sm-12">
              <div class="col-sm-2">
               {{$capital->shareholder}}
              </div>
              <div class="col-sm-2">
               {{$capital->trackingNo}}
              </div>
              <div class="col-sm-2">
               <button class="btn btn-sm btn-info">{{$capital->totalCapital}}</button>
              </div>
              <div class="col-sm-2">
                <button class="btn btn-sm btn-primary">{{$capital->amountReceived}}</button>
              </div>
              <div class="col-sm-2">
                <button class="btn btn-sm btn-warning">{{$capital->balance}}</button>
              </div>
           </div>
           @endforeach
             <?php echo $capitals->render()?>
         </div>
  <!--end view-->


         </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('panel/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('panel/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script type="text/javascript">
    $(function(){
      
        $('#capital-form-btn').hide();
        $('#debit-capital-btn').click(function(){
              $('#capital-form-btn').show();
              $('#deb-capital').show();
              $('#debit-capital').hide();
               $('#debit-capital-btn').hide();
        });
        $('#capital-form-btn').click(function(){
            $('#debit-capital-btn').show();
            $('#capital-form-btn').hide();
            $('#deb-capital').hide();
            $('#debit-capital').show();

        });
        
    });

</script>
    <script src="{{asset('panel/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>

