<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Benvin Admin Panel</title>
    <link href="{{asset('jquery-ui/jquery-ui.css')}}"rel="stylesheet">
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
                        <a href="{{url('staff/createinvoice')}}"><i class="fa fa-briefcase fa-fw"></i>Invoice</a>
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
                            <a href="{{url('staff/clients')}}"><i class="fa fa-user fa-fw"></i>User Clients</a>
                        </li>
                       <li>
                            <a href="{{url('view/staff/orders')}}"><i class="fa fa-file-excel-o fa-fw"></i>Orders</a>
                        </li>
                        <li>
                            <a href="{{url('/viewproducts')}}"><i class="fa fa-barcode fa-fw"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{url('staff/tasks')}}"><i class="fa fa-tasks fa-fw"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="{{url('staff/chats')}}"><i class="fa fa-comment fa-fw"></i>Chats</a>
                        </li>
                        <li>
                            <a href="{{url('staff/reports')}}"><i class="fa fa-newspaper-o fa-fw"></i>Reports</a>
                        </li>
                        <li>
                            <a href="{{url('staff/note')}}"><i class="fa fa-pencil fa-fw"></i>Notes</a>
                        </li>
                       <li>
                            <a href="{{url('staff/createpost')}}"><i class="fa fa-upload fa-fw"></i>Create Post</a>
                        </li>
                        <li>
                            <a href="{{url('staff/posts')}}"><i class="fa fa-envelope fa-fw"></i>Blog</a>
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
          @if(Session::has('staff-orders'))
           <div class="alert alert-success">
             {{Session::get('staff-orders')}}
           </div>
        @endif
         <div class="row">
                <div id="orders" class="col-sm-12">
                  <h2>Orders

                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/order')}}">Gen Excel</a>
                 </button>
                  </h2>
                      <div id="order-header" class="col-sm-12">
                        <div id="order-id" class="col-sm-1">
                          OrderId
                        </div>
                         <div id="order-cliet" class="col-sm-2">
                          Client
                        </div>
                        <div id="order-item" class="col-sm-3">
                          Item
                        </div>
                        <div id="order-status" class="col-sm-2">
                           Status
                        </div>
                          <div id="order-status" class="col-sm-2">
                          Deadline
                        </div>
                      </div>
                      @foreach($orders as $order)
                      <div id="order-details"class="col-sm-12">
                              <div id="order-id" class="col-sm-1">
                           
                           <a href="{{url('view/staff/order')}}/{{$order->id}}">{{$order->orderNo}}</a>
                        </div>
                         <div id="order-client" class="col-sm-2">
                          {{$order->client}}
                        </div>
                        <div id="order-item" class="col-sm-3">
                           {{$order->description}}

                        </div>
                        <div id="order-status" class="col-sm-2">
                           
                          <dutton class="btn btn-info btn-sm">{{$order->status}}</button>
                        </div>
                          <div id="order-status" class="col-sm-2">
                           
                           <dutton class="btn btn-warning btn-sm">{{$order->deliveryDeadline}}</button>
                        </div>
                           <div id="order-status" class="col-sm-2">
                           
                           <dutton class="btn btn-success btn-sm"><a href="{{url('print/order')}}/{{$order->id}}" style="color:#fff">Print Order</a></button>
                        </div>
                      </div>
                      @endforeach
                 <?php echo $orders->render(); ?>
                </div>
         </div>
        <!--    <div class="row">
          <h2>Orders For Registerd clients</h2>
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
            <form id="order-form-style" method="POST" action="{{ url('staff/userorders') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="accessLevel" value="0">
               <label class="control-label">Client</label>
               <select id="clients"name='client'class="form-control" placeholder="Client">
                                 
                    @foreach($clients as $client)
                       <option value='{{$client->id}}'>{{$client->username}}</option></br>
                                      
                     @endforeach                  
               </select></br>
                  <input type="text" class="form-control" name="lpo" value="{{ old('lpo') }}" placeholder="LPO No">
                  </br>
                <textarea class="form-control" cols="50" id="desc"rows="10" name="desc"placeholder="Order Description"></textarea></br>
                <input type="text" class="form-control" name="amountCharged" placeholder="Amount Charged"></br>
                <input type="text" class="form-control" name="amountPaid" placeholder="Amount Paid"></br>
                <input placeholder="Order Deadline" type="text" id="endDatePicker" class="form-control" name="deadline" value="{{ old('endDate') }}"></br>

              <button type="submit" class="btn btn-info">Make Order</button>
                      
          </form>
            <div id="make-order" class="col-sm-12">
             <div id="order-header">
               Create Order
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
            </div>
         <div id="order-form">

              <form id="order-form-style" method="POST" action="{{ url('staff/orders') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="accessLevel" value="0">
                  <input type="text" class="form-control" name="lpo" value="{{ old('lpo') }}" placeholder="LPO No">
                  </br>

                <input type="text" placeholder="Organisation"class="form-control" name="client" value="{{old('client')}}"></br>
                <input type="text" placeholder="Name"class="form-control" name="name" value="{{old('name')}}"></br>
                <input type="text" placeholder="Email"class="form-control" name="email" value="{{old('email')}}"></br>
                <input type="text" placeholder="Phone Number"class="form-control" name="phone" value="{{old('phone')}}"></br>
                <textarea class="form-control" cols="50" id="desc"rows="10" name="desc"placeholder="Order Description"></textarea></br>
                <input type="text" class="form-control" name="amountCharged" placeholder="Amount Charged"></br>
                <input type="text" class="form-control" name="amountPaid" placeholder="Amount Paid"></br>
                <input placeholder="Order Deadline" type="text" id="endDatePicker" class="form-control" name="deadline" value="{{ old('endDate') }}"></br>

              <button type="submit" class="btn btn-info">Make Order</button>
                      
          </form>

            </div>-->
         </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('panel/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.js')}}"></script>
<script type="text/javascript">
$(function(){
     $( "#endDatePicker" ).datepicker({
          inline: true
     });
    
});

</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('panel/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('panel/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>

